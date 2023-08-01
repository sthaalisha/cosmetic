@extends('frontend.layout.header')


@section('content')
    <div class="p-4 m-3">
        <div id="contact" class="box p-4">
            <center>
                <h1>Contact</h1><br>
                <p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
                <br>
                <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>
            </center>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h3><i class="fa fa-map-marker"></i>Address</h3>
                    <p>Lumbini<br>Nawalpur<br>Devchuli-10<br><br><strong>Pragatinagar</strong></p>
                </div>
                <!-- /.col-sm-4-->
                <div class="col-md-4">
                    <h3><i class="fa fa-phone"></i> Call center</h3>
                    <p class="text-muted">Contact with the help of this number if any problem arise in our sites .</p>
                    <p><strong>9805434310</strong></p>
                </div>
                <!-- /.col-sm-4-->
                <div class="col-md-4">
                    <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                    <p class="text-muted">Please feel free to write an email to us.</p>
                    <ul>
                        <li><strong><a href="mailto:">alishastha892@gmail.com</a></strong></li>
                    </ul>
                </div>
                <!-- /.col-sm-4-->
            </div>
            <!-- /.row-->
            <hr>
            <div id="map"></div>
            <hr>
            <h2 class="text-center">Contact me</h2>
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname"
                                class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}"
                                required>
                            @error('firstname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname"
                                class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}"
                                required>
                            @error('lastname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject"
                                class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}"
                                required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send
                            message</button>
                    </div>
                </div>
                <!-- /.row-->
            </form>
        </div>
    </div>
@endsection
