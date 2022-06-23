<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\Country;
use Livewire\Component;
use App\Models\User;
use App\Models\Experience;
use App\Models\Education;
use App\Models\EmergencyContact;
use Livewire\WithFileUploads;


class MyProfile extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $phone, $gender, $address, $avatar, $date_of_birth;
    public $document_number, $expiration_date, $nationality, $religion, $marital_status, $number_of_children;
    public $itemToBeDeleted, $itemToBeUpdated, $model,$isCurrentPosition=0;


   public function mount(){

   }



    public $months = [
        ['abr' => 'Jan',    'num' => '01'],
        ['abr' => 'Feb',    'num' => '02'],
        ['abr' => 'Mar',   'num' => '03'],
        ['abr' => 'Apr',    'num' => '04'],
        ['abr' => 'Mai',    'num' => '05'],
        ['abr' => 'Jun',    'num' => '06'],
        ['abr' => 'Jul',    'num' => '07'],
        ['abr' => 'Aug',  'num' => '08'],
        ['abr' => 'Set',   'num' => '09'],
        ['abr' => 'Oct',  'num' => '10'],
        ['abr' => 'Nov', 'num' => '11'],
        ['abr' => 'Dec', 'num' => '12'],
    ];
    public $employmentTypes =[
        ['type' =>'Full-Time'],
        ['type' =>'Part-Time'],
        ['type' =>'Self-Employment'],
        ['type' =>'Internship'],
        ['type' =>'Trainee'],
    ];



    public function uploadPhoto()
    {
        $this->validate([
            'avatar' => 'required|image|max:2048', // 1MB Max
        ]);
        $new_name = $this->renameImage($this->avatar);
        User::where('id', Auth::user()->id)->update(['avatar' => $new_name]);
        $this->emit('AvatarUpdated');
    }


    protected function renameImage($image)
    {
        $user=$this->getUserInfo();
        $path='public/avatar';
        if($user->avatar  && $path.'/'.$user->avatar){
            unlink('storage/avatar/'.$user->avatar);
        }
        $getExtension = $image->getClientOriginalExtension();
        $new_name = time().'.'.$getExtension;
        $image->storeAs($path, $new_name);
        return $new_name;
    }





    public function editUserInfo()
    {
        $user = $this->getUserInfo();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->gender = $user->gender;
        $this->phone = $user->phone;
        $this->date_of_birth = $user->date_of_birth;
        $this->address = $user->address;
    }

    public function userUpdate()
    {

        $this->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'gender'        => 'required',
            'address'       => 'required',
            'date_of_birth' => 'required',
            'phone'         => 'required',
        ]);
        if($this->avatar){
            $this->uploadPhoto();
        }

        User::where('id', Auth::user()->id)->update([
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'gender'            => $this->gender,
            'phone'             => $this->phone,
            'address'           => $this->address,
            'date_of_birth'     =>$this->date_of_birth
        ]);

        $this->dispatchBrowserEvent('userUpdatedSuccessfully');
    }






    public function editPersonalInfo()
    {

        $user = $this->getUserInfo();
        $this->document_number = $user->document_number;
        $this->expiration_date = $user->expiration_date;
        $this->nationality = $user->nationality;
        $this->religion = $user->religion;
        $this->marital_status = $user->marital_status;
        $this->number_of_children = $user->number_of_children;
    }

    public function updatePersonalInfo()
    {
        $data = $this->validate([
            'document_number'   => 'required',
            'expiration_date'   => 'required',
            'nationality'       => 'required',
            'religion'          => 'required',
            'marital_status'    => 'required',
            'number_of_children'=> 'required',
        ]);



        User::find(Auth::user()->id)->update($data);
        $this->reset();
        $this->dispatchBrowserEvent('userPersonalInfoUpdatedSuccessfully');
    }


    public $name_one, $phone_one, $relationship_one, $name_two, $phone_two, $relationship_two;
    public function editEmergencyContact()
    {
        $user = $this->getUserInfo();

        if($user->emergencyContact){
            $this->name_one = $user->emergencyContact->name_one;
            $this->phone_one = $user->emergencyContact->phone_one;
            $this->relationship_one = $user->emergencyContact->relationship_one;

            $this->name_two = $user->emergencyContact->name_two;
            $this->phone_two = $user->emergencyContact->phone_two;
            $this->relationship_two = $user->emergencyContact->relationship_two;
        }

    }

    public function emergencyContact()
    {
        $this->validate([
            'name_one'  => 'required',
            'phone_one' => 'required',
            'relationship_one'  => 'required'
        ]);
        EmergencyContact::updateOrCreate(
            ['user_id'  => Auth::user()->id],
            [
                'name_one' =>  $this->name_one,
                'phone_one' => $this->phone_one,
                'relationship_one' => $this->relationship_one,
                'name_two' =>  $this->name_two,
                'phone_two' => $this->phone_two,
                'relationship_two' => $this->relationship_two
            ],

        );

        $this->reset();
        $this->dispatchBrowserEvent('emergencyUpdatedSuccessfully');


    }

    public $university, $course, $country, $state, $city, $yearIn, $yearOut;
    public $title, $employmentType, $company,$location,  $from_period, $to_period,$jobDescription;


    public function createEducationExperience($model)
    {

        if($model == 'education'){

            $education = $this->validate([
                'university'    => 'required',
                'course'        => 'required',
                'country'       =>'required',
                'state'         => 'required',
                'city'          => 'required',
                'yearIn'        => 'required',
                'yearOut'       => 'required'
            ]);

            $education = array_merge(['user_id' => Auth::user()->id], $education);
            Education::Create($education);

        }
        if($model == 'experience'){
            if($this->isCurrentPosition)
            {
                $this->to_period = '';
                $this->isCurrentPosition = 1;
            }
            $experience = $this->validate([
                'title'             => 'required',
                'company'           => 'required',
                'employmentType'    => 'required',
                'company'           => 'required',
                'location'          => 'required',
                'from_period'       => 'required',
                'to_period'         =>'string',
                'jobDescription'    => 'required'

            ]);


            $experience = array_merge(['user_id' => Auth::user()->id], $experience);
            $experience = array_merge(['currentPosition' => $this->isCurrentPosition], $experience);
            Experience::Create($experience);
        }
        $this->reset();
        $this->dispatchBrowserEvent('education-experience');
    }



    public function editEducationExperience($model, $id)
    {
       if($model == 'education'){

        $education = Education::where('id', $id)->first();
        $this->university   = $education->university;
        $this->course       = $education->course;
        $this->country      = $education->country;
        $this->state        = $education->state;
        $this->city         = $education->city;
        $this->yearIn       = $education->yearIn;
        $this->yearOut      = $education->yearOut;
        $this->itemToBeUpdated = $id;
       }
       if($model == 'experience'){
        $experience = Experience::where('id', $id)->first();
        $this->title = $experience->title;
        $this->company = $experience->company;
        $this->employmentType = $experience->employmentType;
        $this->location = $experience->location;
        $this->from_period = $experience->from_period;
        $this->to_period = $experience->to_period;
        $this->jobDescription = $experience->jobDescription;
        $this->isCurrentPosition = $experience->currentPosition;
        $this->itemToBeUpdated = $id;
       }


    }


    public function updateEducationExperience($model)
    {
        if($model == 'education'){

            $education = $this->validate([
                'university'    => 'required',
                'course'        => 'required',
                'country'       =>'required',
                'state'         => 'required',
                'city'          => 'required',
                'yearIn'        => 'required',
                'yearOut'       => 'required'
            ]);


            Education::where('id', $this->itemToBeUpdated)->update($education);
        }

        if($model == 'experience'){
            if($this->isCurrentPosition)
            {
                $this->to_period = '';
                $this->isCurrentPosition = 1;
            }

            $experience = $this->validate([
                'title'             => 'required',
                'company'           => 'required',
                'employmentType'    => 'required',
                'company'           => 'required',
                'location'          => 'required',
                'from_period'       => 'required',
                'to_period'         =>'string',
                'jobDescription'    => 'required'

            ]);
            $experience = array_merge(['currentPosition' => $this->isCurrentPosition], $experience);
            Experience::where('id', $this->itemToBeUpdated)->update($experience);


        }
        $this->reset();
        $this->dispatchBrowserEvent('education-experience');
    }


    public function getElementId($model, $id)
    {
        $this->model = $model;
        $this->itemToBeDeleted = $id;
    }


    public function delete()
    {
     if(!$this->model == 'education' || !$this->model == 'experience')
        {
            return redirect()->back();
        }else{
            if($this->model == 'education'){

                Education::findOrFail($this->itemToBeDeleted)->delete();
            }
        if($this->model == 'experience'){
            Experience::findOrFail($this->itemToBeDeleted )->delete();
        }
        $this->dispatchBrowserEvent('closeModal');
     }
    }


    private function getUserInfo()
    {
        return  User::with(['educations','experiences','emergencyContact'])
                        ->where('id',Auth::user()->id)
                        ->first();
    }

    public function switchPosition()
        {
            $this->isCurrentPosition = !$this->isCurrentPosition;
        }



    public function render()
    {

        $user = User::with(['experiences', 'educations','department','emergencyContact'])
                    ->where('id', Auth::user()->id)
                    ->first() ;
        $countries = Country::all();
        return view('livewire.user.my-profile', compact('user','countries'));
    }
}
