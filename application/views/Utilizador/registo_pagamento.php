<section class="section-login">
    <div class="container">
        <div class="align-self-center div-registo">
            <header class="align-self-center">
                <div class="row">

                    <div class="progress progress-striped linha-progresso">
                        <div class="progress-bar progress-bar-info" style="width: 55%"></div>
                    </div>


                    <div class="stepwizard">
                        <div class="row botao-progresso">

                            <div class="col-xs-1 text-center progresso1">
                                <a href="<?=base_url('utilizador/registo_plano');?>" type="button" class="btn btn-info btn-circle">1</a>
                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso2">
                                <a href="<?=base_url('utilizador/registo');?>" type="button" class="btn btn-info btn-circle">2</a>

                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso3">
                                <a href="#step-3" type="button" class="btn btn-info btn-circle">3</a>
                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso4">
                                <a href="#step-4" type="button" class="btn btn-info btn-circle" disabled="disabled">4</a>
                            </div>

                        </div> <!-- row botao-progresso -->
                    </div> <!-- stepwizard -->

                </div> <!-- row -->
            </header>

            <div class="row">
                <article class="card">
                    <div class="card-body p-5">


                        <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                    <i class="fa fa-credit-card"></i> Credit Card</a></li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                                    <i class="fab fa-paypal"></i> Paypal</a></li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                                    <i class="fa fa-university"></i> Bank Transfer</a></li>
                        </ul>


                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="nav-tab-card">
                                <p class="alert alert-success">Some text success or error</p>
                                <form role="form">
                                    <div class="form-group">
                                        <label for="username">Full name (on the card)</label>
                                        <input type="text" class="form-control" name="username" placeholder="" required="">
                                    </div> <!-- form-group.// -->

                                    <div class="form-group">
                                        <label for="cardNumber">Card number</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="cardNumber" placeholder="">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-muted">
                                                    <i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>  
                                                    <i class="fab fa-cc-mastercard"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div> <!-- form-group.// -->

                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">Expiration</span> </label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="MM" name="">
                                                    <input type="number" class="form-control" placeholder="YY" name="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV
                                                    <i class="fa fa-question-circle"></i></label>
                                                <input type="number" class="form-control" required="">
                                            </div> <!-- form-group.// -->
                                        </div>
                                    </div> <!-- row.// -->
                                    <button class="subscribe btn btn-primary btn-block" type="button"> Confirm </button>
                                </form>
                            </div> <!-- tab-pane.// -->



                            <div class="tab-pane fade" id="nav-tab-paypal">
                                <p>Paypal is easiest way to pay online</p>
                                <p>
                                    <button type="button" class="btn btn-primary"> <i class="fab fa-paypal"></i> Log in
                                        my
                                        Paypal </button>
                                </p>
                                <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                    do
                                    eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. </p>
                            </div>


                            <div class="tab-pane fade" id="nav-tab-bank">
                                <p>Bank accaunt details</p>
                                <dl class="param">
                                    <dt>BANK: </dt>
                                    <dd> THE WORLD BANK</dd>
                                </dl>
                                <dl class="param">
                                    <dt>Accaunt number: </dt>
                                    <dd> 12345678912345</dd>
                                </dl>
                                <dl class="param">
                                    <dt>IBAN: </dt>
                                    <dd> 123456789</dd>
                                </dl>
                                <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                    do
                                    eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. </p>
                            </div> <!-- tab-pane.// -->
                        </div> <!-- tab-content .// -->

                    </div> <!-- card-body.// -->
                </article> <!-- card.// -->


                </aside> <!-- col.// -->
            </div> <!-- row.// -->

        </div>
        <!--div registo-->

    </div>
    <!--container end.//-->
</section>







<!-- https://codepen.io/wizly/pen/BlKxo -->



<div class="container">
    <h1>Bootstrap tab panel example (using nav-pills) </h1>
</div>
<div id="exTab1" class="container">
    <ul class="nav nav-pills">
        <li class="active">
            <a href="#1a" data-toggle="tab">Overview</a>
        </li>
        <li><a href="#2a" data-toggle="tab">Using nav-pills</a>
        </li>
        <li><a href="#3a" data-toggle="tab">Applying clearfix</a>
        </li>
        <li><a href="#4a" data-toggle="tab">Background color</a>
        </li>
    </ul>

    <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
            <h3>Content's background color is the same for the tab</h3>
        </div>
        <div class="tab-pane" id="2a">
            <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the
                tab</h3>
        </div>
        <div class="tab-pane" id="3a">
            <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
        </div>
        <div class="tab-pane" id="4a">
            <h3>We use css to change the background color of the content to be equal to the tab</h3>
        </div>
    </div>
</div>


<!-- <hr>
</hr>
<div class="container">
    <h2>Example tab 2 (using standard nav-tabs)</h2>
</div>

<div id="exTab2" class="container">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#1" data-toggle="tab">Overview</a>
        </li>
        <li><a href="#2" data-toggle="tab">Without clearfix</a>
        </li>
        <li><a href="#3" data-toggle="tab">Solution</a>
        </li>
    </ul>

    <div class="tab-content ">
        <div class="tab-pane active" id="1">
            <h3>Standard tab panel created on bootstrap using nav-tabs</h3>
        </div>
        <div class="tab-pane" id="2">
            <h3>Notice the gap between the content and tab after applying a background color</h3>
        </div>
        <div class="tab-pane" id="3">
            <h3>add clearfix to tab-content (see the css)</h3>
        </div>
    </div>
</div> -->


<!-- <div class="container">
    <h2>Example 3 </h2>
</div>
<div id="exTab3" class="container">
    <ul class="nav nav-pills">
        <li class="active">
            <a href="#1b" data-toggle="tab">Overview</a>
        </li>
        <li><a href="#2b" data-toggle="tab">Using nav-pills</a>
        </li>
        <li><a href="#3b" data-toggle="tab">Applying clearfix</a>
        </li>
        <li><a href="#4a" data-toggle="tab">Background color</a>
        </li>
    </ul>

    <div class="tab-content clearfix">
        <div class="tab-pane active" id="1b">
            <h3>Same as example 1 but we have now styled the tab's corner</h3>
        </div>
        <div class="tab-pane" id="2b">
            <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the
                tab</h3>
        </div>
        <div class="tab-pane" id="3b">
            <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
        </div>
        <div class="tab-pane" id="4b">
            <h3>We use css to change the background color of the content to be equal to the tab</h3>
        </div>
    </div>
</div> -->