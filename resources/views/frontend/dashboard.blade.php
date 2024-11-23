@extends('frontend.layouts.app')
@section('content')



<div class="container mt-2">
    <div class="d-flex justify-content-between align-items-center">
        <div>
        <img src="{{ asset('frontend/assets/images/book.jpg') }}" alt="Book Image" class="img-fluid" style="max-width: 100px; height: auto;">

            <h6>Book Store</h6>
            <p>Welcome, <b>{{ auth()->user()->name }}!</b>  Discover and manage your favorite books!</p>
        </div>
        
        <div class="col-md-4">
            <form action="" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Search by book title or author">
                <button type="submit" class="btn btn-primary ml-2">Search</button>
            </form>
        </div>

        <div>
            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>


<div class="container-fluid px-4">
    <div class="row">
        @foreach($books as $book)
            <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
                <div class="card shadow-sm {{ $loop->odd ? 'bg-light-blue' : 'bg-light-green' }}">
                    <div class="card-body">
                        <h6 class="card-title text-truncate" style="max-width: 200px;"><i class="fa-solid fa-book fa-lg" style="color: #63E6BE;"></i> Title:- {{ $book->title }}</h6>
                        <p class="card-text text-muted"><b>Written By: {{ $book->author }}</b></p>
                        <p>

                            @if($book->average_rating)
                            <strong><i class="fa-solid fa-star" style="color: #FFD43B;"></i></strong> 
                                {{ number_format($book->average_rating, 1) }} / 5
                            @endif
                        </p>
                        <p>Reviewed by- <b>{{ $book->ratings->count() }}</b></p>
                        </p>

                      
                        @auth
                        <form action="{{ route('books.rate',$book->id) }}" method="POST">
                            @csrf
                            <label for="rating">Rate this book:</label> 

                            
                            <div>
                                <input type="radio" id="1star" name="rating" value="1" @if($book->average_rating == 1) checked @endif required> 1
                                <input type="radio" id="2stars" name="rating" value="2" @if($book->average_rating == 2) checked @endif required> 2
                                <input type="radio" id="3stars" name="rating" value="3" @if($book->average_rating == 3) checked @endif required> 3
                                <input type="radio" id="4stars" name="rating" value="4" @if($book->average_rating == 4) checked @endif required> 4
                                <input type="radio" id="5stars" name="rating" value="5" @if($book->average_rating == 5) checked @endif required> 5
                            </div>
                            <button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa-regular fa-star"></i></button>
                        </form>
                        @endauth

                        @auth
                        <form class="mt=2" action="{{ route('comments.store', $book->id) }}" method="POST">
                            @csrf
                            <div class="form-group mt-2">
                                <textarea name="comment" class="form-control" rows="1" placeholder="Write your comment here..." required></textarea>
                                @error('comment')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-2"><i class="fa-regular fa-comment"></i></button>
                        </form>
                        @endauth


                        @foreach($book->comments as $comment)
                        <p>
                            <strong class="d-inline">{{ $comment->user->name }}</strong> says: 
                            <span class="d-inline">{{ $comment->comment }}</span>
                        </p>
                        @endforeach

                    </div>
                </div>
            </div>
        @endforeach
    </div>

   
</div>


<div class="d-flex justify-content-end">
    <div>
        {{ $books->links('pagination::bootstrap-4') }}
    </div>
</div>



@endsection