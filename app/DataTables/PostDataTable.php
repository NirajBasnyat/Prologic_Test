<?php

namespace App\DataTables;

use App\Models\Post;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PostDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function (Post $post) {
                return $post->created_at->diffForHumans();
            })
            ->addColumn('action', function (Post $post) {
                $actionBtn = '
                    <a href="/post/' . $post->slug . '/edit" class="btn btn-xs btn-primary">Edit</a>

                    <a href="' . route('post.show', $post->slug) . '" class="btn btn-xs btn-dark"> show</a>

                    <form action="' . route('post.destroy', $post->slug) . '" method="POST" style=" display:inline!important;">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
                    <button type="submit" class="btn btn-danger btn-xs" 
                        onclick="return confirm(\'Are You Sure Want to Delete?\')">delete</a>
                    </form> 
                ';
                return $actionBtn;
            });


        /*
        
         <form action="{{ route(\'post.destroy\', $post->slug)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-sm btn-danger">Delete</button>
                    </form>     
        
        <form action="{{ route(\'post.destroy\',' . $post->slug . ') }}" method="POST">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
                    <button type="submit" class="btn btn-danger btn-xs"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')">delete</a>
                    </form> */
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Post $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('post-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'title', 'created_at', 'action'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Post_' . date('YmdHis');
    }
}
