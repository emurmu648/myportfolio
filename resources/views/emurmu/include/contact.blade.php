<section class="wedo" id="contact">
    <div class="container">
        <h3 class="heading text-capitalize text-white text-center"> Contact </h3>
        <p class="subs mt-4 text-center text-white">If you have any question, please feel free to message me</p>
        <div class="contact_grid_right mt-5 mx-auto text-center">
            <form action="{{route('contact.send')}}" method="post">
                @csrf
                <div class="row contact_top">
                    <div class="col-sm-4">
                        <input type="text" name="name" placeholder="Name">
                    </div>
                    <div class="col-sm-4">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="phone" placeholder="Phone No.">
                    </div>

                </div>
                <textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                <input type="submit" value="Send Message">
                <input type="reset" value="Clear Form">
                <div class="clearfix"> </div>
            </form>
        </div>
        <div class="cpy-right text-center">
            <div class="follow">
                <ul class="social_section_1info">
                    <li><a href="https://www.facebook.com/HPF-Designs-102214394891875/?modal=admin_todo_tour" target="_blank"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="https://twitter.com/DesignsHpf" target="_blank"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="https://dribbble.com/HPFDesigns" target="_blank"><span class="fa fa-dribbble"></span></a></li>
                    <li><a href="https://www.pinterest.com/hpfdesigns/_saved/" target="_blank"><span class="fa fa-pinterest"></span></a></li>
                </ul>
            </div>
            <p>© {{date("Y")}} Exclusive. All rights reserved | Design by
                <a href="{{route('/')}}"> Elias Murmu.</a>
            </p>
        </div>
    </div>
</section>
