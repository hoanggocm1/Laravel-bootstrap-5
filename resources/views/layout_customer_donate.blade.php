<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
    <title>Customer Donate</title>
</head>

<body>
    <div class="layout">
        <div class="main">
            <div class="left-image">
                <img src="{{ asset('image/dep-the-gioi.jpg') }}" alt="">
            </div>
            <div class="right-image">
                <div class="right-info">
                    <form id="form-data" class="row g-4" action="/save-customer-donate" method="POST">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label fw-bold">FIRST NAME <span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label fw-bold">GENDER <span
                                    class="required">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="gender" required>
                                <option value="man" selected>Man</option>
                                <option value="woman">Woman</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label fw-bold">LAST NAME <span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="inputEmail4" name="last_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label fw-bold">PAYMENT MODE <span
                                    class="required">*</span></label>
                            <div class="form-check-inline g-5" style="height: 100%;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_mode" id="inlineRadio1"
                                        value="visa" checked />
                                    <span class="form-check-label" for="inlineRadio2">Visa</span>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_mode" id="inlineRadio2"
                                        value="mastercard" />
                                    <span class="form-check-label" for="inlineRadio2">Mastercard</span>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_mode" id="inlineRadio3"
                                        value="amex" />
                                    <span class="form-check-label" for="inlineRadio2">Amex</span>
                                </div>
                                <div class="form-check form-check-inline align-middle" style="height: 38px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label fw-bold">COMPANY <span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Your company"
                                name="company" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label fw-bold">CARD NUMBER <span
                                    class="required">*</span></label>
                            <input id="cc-number" type="tel" class="input-lg form-control cc-number" required
                                autocomplete="cc-number"
                                placeholder="&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;"
                                name="card_number">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label fw-bold">EMAIL <span
                                    class="required">*</span></label>
                            <input type="email" class="form-control" id="inputEmail4"
                                placeholder="Your email address" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label fw-bold">EXPIRATION <span
                                    class="required">*</span></label>
                            <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" maxlength="7"
                                autocomplete="cc-exp" placeholder="MM / DD" name="expiration" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label fw-bold">PHONE NUMBER <span
                                    class="required">*</span></label>
                            <input type="tel" class="form-control" id="inputEmail4" pattern="[0-9]{10}"
                                maxlength="10" placeholder="Your phone number" name="phone_number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label fw-bold">CVN <span
                                    class="required">*</span></label>
                            <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc"
                                autocomplete="off" placeholder="&bull;&bull;&bull;&bull;" maxlength="4"
                                name="cvn" required>
                        </div>

                        <div class="range-donate">
                            <label for="inputPassword4" class="form-label fw-bold">DONATE US <span
                                    class="required">*</span></label>
                            <span id="note"> &ensp; Minimum $10</span> &ensp;
                            <input type="number" min="10" max="1000" value="10" id="tempValue"
                                onchange="changeValue(this.value)"> $
                            <input type="range" min="10" max="1000" value="10" id="slider-donate"
                                name="donate_us" required>
                            <div id="selector" onmousedown="return false" onselectstart="return false">
                                <div class="selectBtn">
                                    <span id="span-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                                        </svg>
                                    </span>
                                    <span id="span-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                </div>
                                <div id="selectValue"></div>
                            </div>
                            <div id="progressBar">
                                <span id="span-progressBar"></span>
                            </div>
                        </div>
                        <div class="button d-flex justify-content-end">
                            <button type="submit" class="btn btn-success fw-bold">SUBMIT</button>&ensp;
                            <button type="reset" id="reset-Input" onclick="resetInput()"
                                class="btn btn-light fw-bold">RESET</button>
                        </div>
                        @csrf
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/main.js') }}"></script>

</html>
