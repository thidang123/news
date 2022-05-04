@extends('master.master')
@section('main')
    @push('css')
        <link rel="stylesheet" type="text/css"
              href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.css"/>
    @endpush
    <div class="row d-flex justify-content-center text-center">
        <a href="{{route('user.create')}}" type="button"
           class="btn btn-primary" style="float: right">
            Add new user
        </a>
    </div>
    {{--      <div id="search-wrapper">
              <caption>
                  <form action="">
                      <input style="color: #0b0b0b; float: right; /*margin: auto; display: block;*/" type="search" name="q" id="search"
                             placeholder="Search something...">
                      <div style="color: #0b0b0b; margin: auto; display: block;" id="close-icon"></div>
                  </form>
              </caption>
          </div>--}}
    <div class="row">
        <div class="card">
            <table class="table table-striped" id="table-index">


                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>{{--
                @foreach($data as $each)
                    <tr>
                        <th scope="row">
                            {{$each->id}}
                        </th>
                        <td>
                            {{$each->first_name}}
                        </td>
                        <td>
                            {{$each->last_name}}
                        </td>
                        <td>
                            {{$each->user_name}}
                        </td>
                        <td>
                            {{$each->email}}
                        </td>
                        <td>
                            {{date("F jS, Y", strtotime($each->created_at))}}
                        </td>
                        <td>
                            <a class="btn btn-outline-primary" href="{{route('user.edit',$each)}}">
                                Edit user
                            </a>
                        </td>
                        <td>
                            <form action="{{route('user.destroy', $each)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach--}}
                </tbody>
            </table>
            {{--  <nav>
                  <ul class="pagination pagination-rounded mb-0">
                      {{$data->links()}}
                  </ul>
              </nav>--}}
        </div>
    </div>
    @push('js')
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript"
                src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.js"></script>
        <script>
            $(function () {
                $('#table-index').DataTable({
                    dom: 'Blfrtip',
                    select: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('user.api') !!}',
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'user_name', name: 'user_name'},
                        {data: 'email', name: 'email'},
                        {
                            data: 'avatar',
                            targets: 5,
                            name: 'avatar',
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                if (!data) {
                                    return '';
                                }
                                return `<img src="{{asset('img/avaUser')}}/${data}">`;
                            }
                        },
                        {
                            data: 'created_at',
                            targets: 6,
                            name: 'created_at',
                        },
                        {
                            data: 'edit',
                            targets: 7,
                            name: 'edit',
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                return `<a class="btn btn-outline-primary" href="${data}">
                                Edit
                            </a>`
                            }
                        },
                        {
                            data: 'destroy',
                            targets: 8,
                            name: 'destroy',
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                return `<form action="${data}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn btn btn-danger">Delete</button>
                            </form>`
                            }
                        },

                    ]
                });
            });
        </script>
    @endpush
@endsection
