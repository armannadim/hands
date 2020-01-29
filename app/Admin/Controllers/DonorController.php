<?php

namespace App\Admin\Controllers;

use App\Models\Donor;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;
use Encore\Admin\Form;
use App\Http\Controllers\Controller;


class DonorController extends Controller
{
    use HasResourceActions;
    protected $title = 'Beneficiary';


    /**
     * Get content title.
     *
     * @return string
     */
    protected function title()
    {
        return $this->title;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->title($this->title())
            ->description('Description...')
            ->body($this->grid())
            ->row(function (Row $row) {

                $row->column(6, function (Column $column) {
                    $column->append(Donor::all());
                });

            });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form());
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['show'] ?? trans('admin.show'))
            ->body($this->detail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form()->edit($id));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Beneficiary);

        // The first column displays the id field and sets the column as a sortable column
        $grid->id('ID')->sortable();

        // The second column shows the title field, because the title field name and the Grid object's title method conflict, so use Grid's column () method instead
        $grid->column('name');
        $grid->column('first_name');
        $grid->column('last_name');
        $grid->email()->display(function ($email) {
            return "<a href='mailto:$email'>" . $email . "</a>";
        });
        $grid->column('phone');

        // The following shows the columns for the three time fields
        $grid->created_at()->display(function ($created_at) {
            return date('d-m-Y', strtotime($created_at));;
        });
        $grid->updated_at()->display(function ($updated_at) {
            return date('d-m-Y', strtotime($updated_at));;
        });


        // The filter($callback) method is used to set up a simple search box for the table
        $grid->filter(function ($filter) {

            // Sets the range query for the created_at field
            $filter->between('created_at', 'Created Time')->datetime();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Beneficiary::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        $form = new Form(new Beneficiary);

        $form->display('id', __('ID'));
        $form->text('name', __('Name'));
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }


}
