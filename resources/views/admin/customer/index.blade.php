@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="page-title mb-0">Customers Data Page</h1>
        <p class="text-muted">Manage your customer data</p>

        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-success mb-3 rounded-pill px-3 shadow-sm">
                <i class="fas fa-plus mr-1"></i>
                Tambah Customer
            </a>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="50px">NO</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (!$customer->count())
                    <tr>
                        <td colspan="3" class="text-centers">
                            Data customer is empty
                        </td>
                    </tr>
                @endif
                @foreach ($customer as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->user->name }}</td>
                        <td>{{ $user->user->email }}</td>
                        <td>{{ $user->no_telepon }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>
                            <a href="#" class="text-primary mr-2">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="text-success mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {!! $products->links() !!} --}}
    </div>

    <form action="" id="form-destroy" method="post">
        @csrf
        @method('delete')
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0/jquery.min.js"
        integrity="sha512-YuCuk5nNmVIUfKROKeV3fpZZ5Vt9vsnq8nExr5JwEJc2r1YDVmDfujcq373eHIzjqdxwCzoKpxngIaAdRUyg3A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.26.25/sweetalert2.all.min.js"
        integrity="sha512-9S3+vn3rpxj9li6QMuzZn0uzL7wRzoDC0TNhc389WlriJIMcD1aZEZAIGBDjgUBTiVKREmrjki7jNupqIR29bw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.26.25/sweetalert2.css"
        integrity="sha512-b4kJJkqCIwzw7lY0ixRCGopDeOJFugIBbp0JqTqJJQpjAMBZZut6Lel6nJl0Vf352RIbj49M2T7g2ZVg9mxEKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type="text/javascript">
        function actionDestroy(url) {
            Swal.fire({
                title: "Apakah kamu akan hapus data?",
                text: "Kamu tidak bisa mengembalikan yang sudah di hapus",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "YA, HAPUS!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-destroy').attr('action', url);
                    $('#form-destroy').submit();
                };
            });
        }
    </script>
@endsection
