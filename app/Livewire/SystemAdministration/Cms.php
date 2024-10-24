<?php

namespace App\Livewire\SystemAdministration;

use App\Models\Activity;
use App\Models\HeaderTextCarousel;
use App\Models\HeroSection;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Cms extends Component
{
    use WithPagination;
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

    public $heroSection;

    public function mount()
    {
        $this->heroSection = HeroSection::first() ?? new HeroSection();
        $this->title = $this->heroSection->title;
        $this->text = $this->heroSection->text;
        $this->callToAction = $this->heroSection->call_to_action;
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
        session()->flash('message', 'Header Carousel has been deleted.');
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
        ]);
        $this->reset();
        session()->flash('message', 'Activity has been saved successfully.');
        return redirect()->route('cms');
    }

    public function render()
    {
        return view('livewire.system-administration.cms', [
            'headerCarousels' => HeaderTextCarousel::latest()->paginate(4),
            'heroSection' => HeroSection::first(),
            'activities' => Activity::latest()->paginate(4),
        ])->layout('layouts.admin');
    }
}
