@extends('front.layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 bg-light p-2 shadow mt-3">
                <p class="my-2"><b>Fast Tech Help Center | 24x7 Customer Care Support</b></p>
                <p class="contact-desc">The Fast Tech Help Centre page lists out various types of issues that you may have
                    encountered so that there can be quick resolution and you can go back to shopping online. For example,
                    you can get more information regarding order tracking, delivery date changes, help with returns (and
                    refunds), and much more. The Flipkart Help Centre also lists out more information that you may need
                    regarding Flipkart Plus, payment, shopping, and more. The page has various filters listed out on the
                    left-hand side so that you can get your queries solved quickly, efficiently, and without a hassle. You
                    can get the Fast Tech Help Centre number or even access Fast Tech Help Centre support if you need
                    professional help regarding various topics. The support executive will ensure speedy assistance so that
                    your shopping experience is positive and enjoyable. You can even inform your loved ones of the support
                    page so that they can properly get their grievances addressed as well. Once you have all your queries
                    addressed, you can pull out your shopping list and shop for all your essentials in one place. You can
                    shop during festive sales to get your hands on some unbelievable deals online. This information is
                    updated on 2023</p>
            </div>


            <div class="col-12 mt-4 ">
                @include('front.message')
                <section class="mb-4">
                    <div class="row border shadow pb-3">

                        <!--Grid column-->
                        <div class="col-md-9 mb-md-0 mb-5">
                            <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>

                            <form action="" method="post" id="contactUsForm" name="contactUsForm">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="md-form mb-0">
                                            <label for="name" class="">Your name</label>
                                            <input type="text" id="name" name="name" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="md-form mb-0">
                                            <label for="mobile" class="">Your Mobile</label>
                                            <input type="text" id="mobile" name="mobile" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <div class="md-form mb-0">
                                            <label for="subject" class="">Subject</label>
                                            <input type="text" id="subject" name="subject" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="md-form mb-0">
                                            <label for="email" class="">Your email</label>
                                            <input type="text" id="email" name="email" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>
                                    <!--Grid column-->


                                </div>
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <label for="message">Your message</label>
                                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->
                                <div class="text-center text-md-left mt-3">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-3 text-center pt-5">
                            <ul class="list-unstyled mb-0">
                                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                    <p>Motiwala complax, Nirala bazar, Aurangabad, <br>
                                        zip 431001, Maharastra, India</p>
                                </li>

                                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                    <p>+ 9730214356</p>
                                </li>

                                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                    <p>nikamvaibhav028@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                    </div>

                </section>
                <!--Section: Contact v.2-->
            </div>

        </div>
    </div>
@endsection


@section('customJs')

<script>
       $("#contactUsForm").submit(function(event)
        {
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{route("front.contact.store")}}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response)
                {
                    $("button[type=submit]").prop('disabled', false);


                    if(response["status"] == true)
                    {
                        window.location.href="{{route('front.contact')}}";

                        $('#name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $('#email').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $('#mobile').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                    }
                    else
                    {
                    var errors = response['errors'];
                    if(errors['name'])
                    {
                        $('#name').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['name']);
                    }
                    else
                    {
                        $('#name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }



                    if(errors['email'])
                    {
                        $('#email').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['email']);
                    }
                    else
                    {
                        $('#email').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }

                    if(errors['mobile'])
                    {
                        $('#mobile').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['mobile']);
                    }
                    else
                    {
                        $('#mobile').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }

                    }

                    

                },error: function(jqXHR, exception)
                {
                    console.log("Something went wrong");
                }
            })
        });

</script>
    
@endsection
