@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>All Users <small>(registered)</small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>User's<small>Details</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First name</th>
                                                    <th>Last name</th>
                                                    <th>Gender</th>
                                                    <th>E-mail</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allusers as $user)
                                                    <tr id="user-row-{{ $user->id }}">
                                                        <td>{{ $loop->iteration + ($allusers->currentPage() - 1) * $allusers->perPage() }}</td>
                                                        <td class="editable">{{ $user->fname }}</td>
                                                        <td class="editable">{{ $user->lname }}</td>
                                                        <td class="editable">{{ $user->gender }}</td>
                                                        <td class="editable">{{ $user->email }}</td>
                                                        <td style="display: flex">

                                                            <a href="{{ route('admin_edit_user_form', $user->id) }}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <form id="delete-user"
                                                                action="{{ route('admin_delete_user', $user->id) }}"
                                                                method="POST" style="display:inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" data-toggle="tooltip"
                                                                    data-placement="top" title="Delete">
                                                                    <i class="fa fa-minus-circle"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                         <!-- Pagination Links -->
                                         <div class="d-flex justify-content-center all-pagination">
                                            {{ $allusers->links() }}
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /page content -->
@endsection
