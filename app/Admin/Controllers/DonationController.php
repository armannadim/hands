<?php

namespace App\Admin\Controllers;

use App\Models\Beneficiary;
use App\Models\Donation;
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


class DonationController extends AdminController
{
    use HasResourceActions;
    protected $title = 'Donation';


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
        $grid = new Grid(new Donation);

        // The first column displays the id field and sets the column as a sortable column
        $grid->id('ID')->sortable();

        // The second column shows the title field, because the title field name and the Grid object's title method conflict, so use Grid's column () method instead
        $grid->column('amount');
        $grid->column('donation_date')->display(function ($created_at) {
            return date('d-m-Y', strtotime($created_at));
        });
        $grid->column('beneficiary', 'Beneficiary')->display(function () {
            return $this->beneficiary->name;
        });
        $grid->column('donor', 'Donor')->display(function () {
            return $this->donor->name;
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
        $model = new Donation();
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

        $model = new Donation;
        $form = new Form($model);

        $form->column(1/2, function ($form){
            $form->date("donation_date", "Donation Date");
            $form->select("donation_receiver", "Beneficiary")->options(function () {
                $beneficiary = Beneficiary::get()->pluck('name', 'id')->toarray();
                $beneficiary = array_merge(['0' => 'Select Beneficiary'], $beneficiary );
                return $beneficiary;
            });
        });
        $form->column(1/2, function ($form){
            $form->text('amount', "Amount")->pattern('[0-9]{8}');
            $form->select("donor_id", "Donor")->options(function () {
                $donor = Donor::get()->pluck('name', 'id')->toarray();
                $donor = array_merge(['0' => 'Select Donor'], $donor );
                return $donor;
            });
        });



        return $form;
    }

}
