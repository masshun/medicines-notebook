<?php
namespace App\Http\ViewComposers;
     
use Illuminate\View\View;
use Illuminate\Support\Str;
 
class HogeComposer
{
    /**
    * @var String
    */
    protected $users;
     
    public function __construct()
    {
        $this->users = Auth::user();
    }
     
    /**
    * Bind data to the view.
    * @param View $view
    * @return void
    */
    public function compose(View $view)
    {
       //$view->with('medicines', Str::limit($medicines, 17, '(...)'))// = Str::limit($medicines, 17, '(...)');
    }
}