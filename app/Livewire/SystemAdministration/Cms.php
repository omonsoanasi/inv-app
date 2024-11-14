<?php

namespace App\Livewire\SystemAdministration;

use App\Models\Activity;
use App\Models\HeaderTextCarousel;
use App\Models\HeroSection;
use App\Models\HowTo;
use App\Models\RegulatedBy;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Cms extends Component
{
    use WithPagination;
    use WithFileUploads;
    #[Rule('required')]
    public $headerCarouselText;
    //hero section fields
    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $text;
    #[Rule('required')]
    public $callToAction;
    #[Rule('required')]
    public $activity_name;
    #[Rule('required')]
    public $activity_commission;
    #[Rule('required')]
    public $daily_tasks;
    #[Rule('required')]
    public $task_reset;

    //regulators
    #[Rule('required')]
    public $regulator_name;
    #[Rule('required')]
    public $regulator_image;

    #[Rule('required')]
    public $how_title;
    #[Rule('required')]
    public $how_text;
    #[Rule('required')]
    public $how_callToAction;


    public $heroSection;
    public $howTo;

    public $editMode = false;

    public function mount()
    {
        $this->heroSection = HeroSection::first() ?? new HeroSection();
        $this->title = $this->heroSection->title;
        $this->text = $this->heroSection->text;
        $this->callToAction = $this->heroSection->call_to_action;

        $this->howTo = HowTo::first() ?? new HowTo();
        $this->how_title = $this->howTo->how_title;
        $this->how_text = $this->howTo->how_text;
        $this->how_callToAction = $this->howTo->how_call_to_action;
    }

    public function saveHeaderCarousel()
    {
//        $this->validate();
        $headerTextCarousel = HeaderTextCarousel::create([
            'header_carousel_text' => $this->headerCarouselText,
        ]);
        $this->reset();
        session()->flash('message', 'Header Carousel has been saved successfully.');
        return redirect()->route('cms');
    }
    public function deleteHeaderCarouselText($id)
    {
        HeaderTextCarousel::destroy($id);
        session()->flash('deleted', 'Header Carousel has been deleted.');
        return redirect()->route('cms');
    }

    public function saveHeroSection()
    {
//        $this->validate();
        $heroSection = HeroSection::updateOrCreate(
            [],
            [
                'title' => $this->title,
                'text' => $this->text,
                'call_to_action' => $this->callToAction,
            ]
        );
        session()->flash('message', 'HeroSection has been saved successfully.');
        return redirect()->route('cms');
    }

    public function saveActivity()
    {
//        $this->validate();
        $activity = Activity::create([
            'activity_name' => $this->activity_name,
            'activity_commission' => $this->activity_commission,
            'daily_tasks' => $this->daily_tasks,
            'task_reset' => $this->task_reset,
        ]);
        $this->reset();
        session()->flash('message', 'Activity has been saved successfully.');
        return redirect()->route('cms');
    }

    public function editActivity($id)
    {
        dd($id);
    }
    public function updateActivity()
    {
        dd($this->activity_name);
    }

    public function deleteActivity($id)
    {
        Activity::destroy($id);
        session()->flash('deleted', 'Activity has been deleted.');
        return redirect()->route('cms');
    }

    public function saveRegulationInformation()
    {
//        dd($this->regulator_image);
        // Create a new regulator entry
        $regulator = RegulatedBy::create([
            'regulator_name' => $this->regulator_name,
        ]);

        // Check if the image was uploaded
        if ($this->regulator_image) {
            // Clear old media from the collection
            $regulator->clearMediaCollection('regulator_image');

            // Add the new file to the media collection
            $regulator->addMedia($this->regulator_image->getRealPath())
                ->usingFileName($this->regulator_image->getClientOriginalName())
                ->toMediaCollection('regulator_image');
        }

        // Flash a success message
        session()->flash('message', 'Regulator successfully saved.');

        // Redirect to the desired route
        return redirect()->route('cms');
    }

    public function deleteRegulator($id)
    {
        RegulatedBy::destroy($id);
        session()->flash('deleted', 'Regulator successfully deleted.');
        return redirect()->route('cms');
    }

    public function saveHowSection()
    {
//        $this->validate();
        $heroSection = HowTo::updateOrCreate(
            [],
            [
                'how_title' => $this->how_title,
                'how_text' => $this->how_text,
                'how_call_to_action' => $this->how_callToAction,
            ]
        );
        session()->flash('message', 'How to section has been saved successfully.');
        return redirect()->route('cms');
    }

    public function render()
    {
        return view('livewire.system-administration.cms', [
            'headerCarousels' => HeaderTextCarousel::latest()->paginate(4),
            'heroSection' => HeroSection::first(),
            'activities' => Activity::latest()->paginate(4),
            'regulatedBies' => RegulatedBy::latest()->paginate(4),
            'howTo' => HowTo::first(),
        ])->layout('layouts.admin');
    }
}
