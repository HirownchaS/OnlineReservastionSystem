@extends('Layout.default')

@section('content')
    {{-- <main>
        <section>
            <img src="{{ asset("images/contact.jpg") }}" alt="Contact Us" style="width:100%; height:auto;">
            <h2>Get in Touch</h2>
            <form action="{{ route("contact") }}" method="post">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="5" cols="30" required></textarea><br><br>

                <input type="submit" value="Send Message">
            </form>
        </section>
    </main> --}}
    <main class="container my-5">
        <h1>Contact Us</h1>
    <p>We'd love to hear from you! Feel free to reach out with any questions or feedback.</p>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('assets/images/contact.jpg') }}" class="card-img-top" alt="Contact Image">
                    <div class="card-body">
                        <h5 class="card-title">Get in Touch</h5>
                        <p class="card-text">Our team is here to assist you with any inquiries or concerns.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </main>

  @endsection
