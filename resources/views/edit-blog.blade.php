<!doctype html>
<html lang="en">

<head>
    <title>Blog</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;"">
  <a class=" navbar-brand" href="#">Simreka</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active">
                    <a class="page-scroll" href="{{ '/home' }}">Home</a>
                </li>
                @if (Route::has('login'))
                    <li class="nav-item">
                        @auth
                        <li class="nav-item">
                            <a class="page-scroll" href="{{ 'add-blog' }}">Add Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll" href="{{ 'all-blog' }}">List of Blogs</a>
                        </li>
                        <li class="nav-item">
                        <a class="page-scroll" href="{{'logout'}}">Logout</a>
                        </li>


                    @else
                        <a class="page-scroll" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="page-scroll" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif

            </ul>

        </div>
    </nav>
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header" style="background-color:pink">Edit Post </div>
                        <div class="card-body">
                            @if (Session::has('blog_updated'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    {{ Session::get('blog_updated') }}
                                </div>
                            @endif
                            <form action="{{ route('blog.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $blog->id }}" />
                                <div class="form-group">
                                    <label for="title"> Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}"
                                        placeholder="Enter Title" />
                                </div>
                                <div class="form-group">
                                    <label for="description"> Description</label>
                                    <textarea name="description" value="{{ $blog->description }}" class="form-control"
                                        rows="3" placeholder="Enter Description for Blog"></textarea>

                                </div>
                                <div class="form-group">
                                    <label for="title"> Name of the Author</label>
                                    <input type="text" name="author_name" value="{{ $blog->author_name }}"
                                        class="form-control" placeholder="Enter Name author" />

                                </div>
                                <div class="form-group">
                                    <button name="post" type="submit" class="btn btn-success">UPDATE</button>
                                    <button name="cancel" type="submit" class="btn btn-danger">CANCEL</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

</body>

</html>
