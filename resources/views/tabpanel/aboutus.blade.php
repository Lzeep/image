<div class="about-us">
    <div class="formBx">
        <form action="">
            <h2>Contact US</h2>
            <div class="inputBox">
                <input type="text" name="" required="required">
                <span>Full Name</span>
            </div>
            <div class="inputBox">
                <input type="email" name="" required="required">
                <span>Email Address</span>
            </div>
            <div class="inputBox">
                <textarea required="required"></textarea>
                <span>Type Your Message Here...</span>
            </div>
            <div class="inputBox">
                <input type="submit" value="Send" name="">
            </div>
        </form>
    </div>
    <div class="imgBx"></div>
</div>
@push('styles')
    <style>
        .about-us {
            width: 1124px;

        }
        .about-us h2 {
            text-align: center;
        }
    </style>
@endpush

@push('scripts')

@endpush
