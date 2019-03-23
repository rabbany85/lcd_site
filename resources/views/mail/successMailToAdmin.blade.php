
                            

                            <h4>iMetroTech <small>Order Information</small></h4>
                            

<strong>Dear Shoomit,</strong><br>
<p>You have received a new order. Please login to your admin panel to see the order in details.</p>
<br>

                            <h4>Customer Details</h4>

                            <address>
                                <strong>{{$mailData['name']}}</strong><br>
                                {{$mailData['addressLine1']}}<br>
                                {{$mailData['addressLine2']}}<br>
                                City: {{$mailData['city']}}<br>
                                Post Code:{{$mailData['postCode']}}<br>
                                Country: {{$mailData['country']}}<br>
                                <abbr title="Phone">Phone:</abbr> {{$mailData['phone']}}<br>
                                <abbr title="Email">Email:</abbr> {{$mailData['email']}}<br>
                            </address>
                        </div>
                        
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="m-t"><strong>Total Amount: £{{$mailData['amount']}}</strong>
                                <br>Order Number: {{$mailData['orderNumber']}}<br>
                            <strong>Please login to your admin panel to see the order in details</strong>  

                            <br>
                            <strong>iMetroTech</strong>  
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


</div>

