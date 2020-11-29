<?php

namespace App\Admin\Controllers;

use App\Models\Donor;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;
use Encore\Admin\Form;
use App\Http\Controllers\Controller;


class DonorController extends AdminController
{
    use HasResourceActions;
    protected $title = 'Donor';


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
            ->body($this->grid());/*
            ->row(function (Row $row) {
                $row->column(6, function (Column $column) {
                    $column->append(Project::all());
                });
            });*/
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
        $grid = new Grid(new Donor());

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
        $model = new Donor();
        $show = new Show($model->findOrFail($id));

        $columns = $model->getTableColumns();
        foreach ($columns as $column) {
            $show->field($column, __($column));
        }

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        $model = new Donor;
        $form = new Form($model);
        $form->display('id', __('ID'));
        $columns = $model->getTableColumns();
        foreach ($columns as $column) {
            if (!in_array($column, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                $states = [
                    'Yes'  => ['value' => 1, 'text' => 'Yes', 'color' => 'success'],
                    'No' => ['value' => 0, 'text' => 'No', 'color' => 'danger'],
                ];

                if($column == 'send_future_mail'){
                    $form->switch($column, "Send Future Mail")->states($states)->default(1);
                }elseif ($column == 'preferred_contact_medium'){
                    $form->radio($column, 'Preferred contact medium')->options([1 => 'Email', 2=>'Phone call', 3=>'SMS']);
                }elseif($column == 'publish_name'){
                    $form->switch($column, "Publish Donor Name?")->states($states)->default(1);
                }elseif ($column == 'id_type'){
                    $form->radio($column, 'ID Type')
                        ->options(
                            [
                                0 => 'Select ID Type',
                                1 => 'Passport',
                                2 =>'Identity'
                            ]);
                }elseif($column == 'photo'){
                    $form->file($column, 'Photo');
                }else{
                    $form->text($column, __($column));
                }
            }
        }
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Last Modification'));
        //$form->display('deleted_at', __('Deleted At'));

        return $form;
    }


}
