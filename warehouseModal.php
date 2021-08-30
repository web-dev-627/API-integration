<style>
    input[type=checkbox] {
        display: none;
    }

    input[type=checkbox] + label {
        display: inline-block;
        position: relative;
        padding: 8px;
        background-color: white;
        border: 1px solid #3E0E0D;
        border-radius: 50%;
        cursor: pointer;
        height: 1rem;
        width: 1rem;
    }

    input[type=checkbox]:checked + label {
        background-color: white;
        color: red;
    }

    input[type=checkbox]:checked + label:after {
        position: absolute;
        left: 0.2rem;
        top: -5px;
        color: red;
        content: '\2714';
        font-size: 1rem;
        font-weight: bold;
    }
    .modal-body{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }
    @media (max-width : 480px) {
        .custom {
            width: unset;
            min-height: unset;
        }
        #additionalServiceDekkModal1 {
            position: unset;
            width: unset;
            right: unset;
        }
        #additionalServiceBuyModal1 {
            position: unset;
            width: unset;
            right: unset;
        }
    }
    @media (min-width : 480px) {
        .custom {
            width: 30rem;
            min-height: 20rem;
        }
        #additionalServiceDekkModal1 {
            position: fixed;
            width: 30rem;
            right: 15rem;
        }
        #additionalServiceBuyModal1 {
            position: fixed;
            width: 30rem;
            right: 15rem;
        }
    }



</style>
<?php
$sizeOne = '';
for($i=145; $i<=355; $i=$i+10) {
$sizeOne .= '<option value='.$i.'>'.$i.'</option>';
}

$sizeTwo = '';
for($i=30; $i<=90; $i=$i+5) {
$sizeTwo .= '<option value='.$i.'>'.$i.'</option>';
}

$sizeThree = '';
for($i=13; $i<=27; $i++) {
$sizeThree .= '<option value='.$i.'>'.$i.'</option>';
}
?>
<div class="modal fade" id="warehouseModal" tabindex="-1" role="dialog" aria-labelledby="warehouseModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="">
            <div class="modal-header">
                <h5 class="modal-title warehouseModalTitle" id="warehouseModalTitle" >Tyre Order</h5>

                <a class=" nav-link" href="?p=" data-toggle="modal" data-target="#registerModal" id="btn_signup" data-type="register" data-title="Registration" style="position:absolute; right:60px;"
                >Sign up </a>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-warning" role="alert" style="border-radius: 0; margin: -16px -16px 20px; padding: 5px 20px; font-size: 15px; ">
                            Vennligst full ut alle feltene nedenfor, og velg en tjeneste (valgfri)
                        </div>

                        <form>
                            <div class="alert alert-info" role="alert">
                                Skriv inn Reg nr. uten bindestrekk eller mellomrom (eks.: AA11223)
                            </div>
                            
                            <div class="form-group" style="margin-bottom:10px;">
                                <label for="regNr" class="col-form-label labelMod">Reg Nr:</label>
                                <input type="text" class="form-control inputModDekk" id="regNrDekk" placeholder="Bilens Reg Nr">
                                <input type="hidden" id="tyreChangeDekkHotellStore">
                            </div>
                            <div class="form-group" style="margin-bottom:10px;">
                                <label for="name" class="col-form-label labelMod">Navn:</label>
                                <input type="text" class="form-control inputModDekk" id="nameDekk" placeholder="For og Etternavn">
                            </div>
                            <div class="form-group" style="margin-bottom:10px;">
                                <label for="mobile" class="col-form-label labelMod">Mobile:</label>
                                <input type="text" class="form-control inputModDekk" id="mobileDekk" placeholder="Mobile nr">
                            </div>
                            <div class="form-group" style="margin-bottom:10px;">
                                <label for="email" class="col-form-label labelMod">Email:</label>
                                <input type="text" class="form-control inputModDekk" id="emailDekk" placeholder="Email addres">
                            </div>
                            <!--div class="form-group" style="margin-bottom:10px;">
                                <label for="password" class="col-form-label labelMod">Password:</label>
                                <input type="password" class="form-control inputModDekk" id="passDekk" placeholder="Password">
                            </div-->

                            <br>
                            <div class="form-group" style="margin-bottom:10px;">
                                <label for="tyreChangeLocation" class="col-form-label labelMod">Location:</label>
                                <span id="tyreChangeLocation"></span>
                            </div>

                            <div class="form-group" style="margin-bottom:10px; display:none;">
                                <label for="tyres" class="col-form-label labelMod">Number of Tyres:</label>
                                <select class="form-control inputModDekk" id="tyresDekk">
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                </select>
                            </div>
                            <hr>

                            <img src="images/Rolling.gif" class="servicesLoadingDekk" style="width:20px; height:auto; margin:auto; display:block;" />
                            <div id="servicesContainerDekk">
                                <div class="container" style="padding-bottom: 1rem;">
                                    <div class="row" style="border:1px solid black;padding: 1rem;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-1" style="display: flex;align-items: center;">
                                                    <input type="checkbox" id="chk1" name="chkdemo"  >
                                                    <label for="chk1"></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="tbox">Service :</label>
                                                    <span>Hjem</span>
                                                    <br>
                                                    <label for="tbox">Price :</label>
                                                    <span>222</span>
                                                    <br>
                                                    <label for="tbox">Antal :</label>
                                                    <span>1</span>
                                                </div>
                                                <div class="col-md-7">
                                                    <textarea name="textarea" style="width:100%;height: 6rem; padding-left:3%;padding-right:3%;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" style="padding-bottom: 1rem;">
                                    <div class="row" style="border:1px solid black;padding: 1rem;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-1" style="display: flex;align-items: center;">
                                                    <input type="checkbox" id="chk2" name="chkdemo"  >
                                                    <label for="chk2"></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="tbox">Service :</label>
                                                    <span>Uvn</span>
                                                    <br>
                                                    <label for="tbox">Price :</label>
                                                    <span>333</span>
                                                    <br>
                                                    <label for="tbox">Antal :</label>
                                                    <span>1</span>
                                                </div>
                                                <div class="col-md-7">
                                                    <textarea name="textarea" style="width:100%;height: 6rem; padding-left:3%;padding-right:3%;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <br>
                            <div class="priceContainer " style="position:initial;margin: -16px -16px 20px;">
                                <span style="font-size:18px; color:#555;"> Pris: Kr </span>
                                <span id="orderPriceDekk" style="font-size:25px; color:#000; font-weight:400;"> 300 </span>
                            </div>
                            <hr>

                            <div class="form-group" style="margin-bottom:10px;">
                                <label for="tyreChangeDateTimeDekk" class="col-form-label labelMod">Tid og Dato:</label>
                                <input type="text" class="form-control inputModDekk" id="tyreChangeDateTimeDekk" placeholder="Velg tid og dato">
                            </div>


                            <img src="images/Rolling.gif" class="timeSlotsLoadingDekk" style="width:20px; height:auto; margin:auto; display:block;" />

                            <div id="timeSlotsContainerDekk" style="display:none;">
                                <div class="serviceBar inactiveService " style="">
                                    11:30
                                </div>
                                <div class="serviceBar inactiveService " style="">
                                    12:30
                                </div>
                                <div class="serviceBar activeService " style="">
                                    13:30
                                </div>
                            </div>
                            <div id="tyreChangeDekkhotellTyreOffers" style="display:block; margin:auto;width:100%;">


                            </div>

                        </form>
                    </div>
                    <!--<div class="col-sm-4">
                        Vennligst full inn info
                        ønsker du å lagre i min
                        konto
                        tast passord
                        for å fortsette som Gjest
                        la passord feltet stå tomt.

                    </div>-->
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Avbryt</button>
                <!-- <button type="button" class="btn btn-primary" id="checkButton" disabled>Check</button>-->
                <button type="button" class="btn btn-success" id="continueButtonDekk">Fortsett</button>
            </div>
        </div>
    </div>
</div>

<!-- tyres management Modal -->
<div class="modal fade" id="tyreManagementModal" tabindex="-1" role="dialog" aria-labelledby="tyreManagementModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="">
            <div class="modal-header">
                <h5 class="modal-title warehouseModalTitle" id="warehouseModalTitle" >Tyre Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form>
                            <div class="form-group" style="margin-top: 25px; margin-bottom:10px;">
                                <a class="" href="#" data-toggle="modal" data-target="#warehouseModal" data-type="tyreChangeDekkhotell" data-title="Dekkskift" data-price="0">
                                    <div class="form-control tyre-management-popup" >
                                        DEKKHOTELL TIMEBESTILLING
                                        <br>
                                        <span class="action">TRYKK HER</span>
                                    </div>
                                </a>
                            </div>

                            <div class="form-group" style="margin-top: 25px; margin-bottom:10px;">
                                <a class="" href="?p=" data-toggle="modal" data-target="#changeOrdersDateModal" data-type="ChangeOrderDate" data-title="ChangeOrderDate" >
                                    <div class="form-control tyre-management-popup" >
                                        Bytte dato og tid for dekkskift
                                    </div>
                                </a>
                            </div>

                            <div class="form-group" style="margin-top: 25px; margin-bottom:10px;">
                                <a class="" href="?p=" data-toggle="modal" data-target="#registerModal" data-type="register" data-title="Registration" >
                                    <div class="form-control tyre-management-popup" >
                                        Ny kunde
                                    </div>
                                </a>
                            </div>

                            <div class="form-group" style="margin-top: 25px; margin-bottom:10px;">
                                <div class="form-control tyre-management-popup" onclick="tyreManagementOutComingPopup()">
                                    Avslutte Dekkhotell og hente ut dekk
                                </div>
                            </div>

                            <div class="form-group" style="margin-top: 25px; margin-bottom:10px;">
                                <div class="form-control tyre-management-popup" onclick="tyreManagementInComingPopup()">
                                    Ønsker å hente ut dekk , men erstatte de med Nye
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<!-- tyre management Modal For OutComing-->
<div class="modal fade" id="tyreManagementOutComingModal" tabindex="-1" role="dialog" aria-labelledby="tyreManagementOutComingModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="">
            <div class="modal-header">
                <h5 class="modal-title registerModalTitle" id="outComingModal" >Utlevering</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert" style="border-radius: 0; margin: -16px -16px 20px; padding: 5px 20px; font-size: 15px; ">
                    All the fields are required
                </div>

                <form>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="regNrDeleteCustomer" class="col-form-label labelMod">Reg Nr:</label>
                        <input type="text" class="form-control " id="regNrDeleteCustomer" placeholder="Reg Nr">
                    </div>

                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="emailDeleteCustomer" class="col-form-label labelMod">Email:</label>
                        <input type="text" class="form-control " id="emailDeleteCustomer" placeholder="Email">
                    </div>

                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="pickupDateDeleteCustomer" class="col-form-label labelMod">Pickup Date:</label>
                        <input type="text" class="form-control " id="pickupDateDeleteCustomer" placeholder="Pick Date">
                    </div>

                    <div class="form-group " style="margin-bottom:10px;">
                        <button type="button" class="form-control" data-toggle="modal" data-target="#warehouseModal" data-type="tyreChange" data-title="Tyre Change" data-price="0" style="background-color: sandybrown;color: white;cursor: pointer;">
                            TYRE CHANGE
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="checkButton" disabled>Check</button>-->
                <button type="button" class="btn btn-primary" id="outComing">Utlevering</button>
            </div>
        </div>
    </div>
</div>

<!-- tyre management Modal For Incoming-->
<div class="modal fade" id="tyreManagementInComingModal" tabindex="-1" role="dialog" aria-labelledby="tyreManagementInComingModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="">
            <div class="modal-header">
                <h5 class="modal-title registerModalTitle" id="incomingModal" >Incoming and Outcoming</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert" style="border-radius: 0; margin: -16px -16px 20px; padding: 5px 20px; font-size: 15px; ">
                    All the fields are required
                </div>

                <form>
                    <h5 class="modal-title registerModalTitle" >Utlevering</h5>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="regNrOutComingOrder" class="col-form-label labelMod">Reg Nr:</label>
                        <input type="text" class="form-control " id="regNrOutComingOrder" placeholder="Reg Nr">
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="emailOutComingOrder" class="col-form-label labelMod">Email:</label>
                        <input type="email" class="form-control " id="emailOutComingOrder" placeholder="Email">
                    </div>
                    <label for="" class="col-form-label labelMod">Pick up date:</label>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sd-12">
                                <input type="text" class="form-control " id="pickupDateOutComingOrder" placeholder="Pick up Date">
                            </div>
                            <div class="col-md-6 col-sd-12">
                                <input type="text" class="form-control " id="pickupTimeOutComingOrder" placeholder="Pick up Time">
                            </div>
                        </div>
                    </div>
                    <h5 class="modal-title registerModalTitle" >Innlevering</h5>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="regNrInComingOrder" class="col-form-label labelMod">Reg Nr:</label>
                        <input type="text" class="form-control " id="regNrInComingOrder" placeholder="Reg Nr">
                    </div>
                    <div class="form-group " style="margin-bottom:10px;">
                        <label for="tyreSizeInComingOrder" class="col-form-label labelMod">Tyre Size:</label>
                        <div class="container" style="padding: 20px;background-color: #8fd19e;">
                            <div class="row">
                                <div class="col-md-4 col-sd-12">
                                    <div class="select" ">
                                    Bredde
                                    <select class="deleverySelect tyreSizeInOneSelect" data-type="tyreSizeOne" style="">
                                        <?php echo $sizeOne; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sd-12">
                                <div class="select" >
                                    Profil
                                    <select class="deleverySelect tyreSizeInTwoSelect" data-type="tyreSizeTwo" style=" ">
                                        <?php echo $sizeTwo; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sd-12">
                                <div class="select">
                                    Dimensjon
                                    <select class="deleverySelect tyreSizeInThreeSelect" data-type="tyreSizeThree" style="">
                                        <?php echo $sizeThree; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="deliveryDateInComingOrder" class="col-form-label labelMod">Delivery Date:</label>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-sd-12">
                                    <input type="text" class="form-control " id="deliveryDateInComingOrder" placeholder="Delivery Date" >
                                </div>
                                <div class="col-md-6 col-sd-12">
                                    <input type="text" class="form-control " id="deliveryTimeInComingOrder" placeholder="Delivery Time">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="seasonInComingOrder" class="col-form-label labelMod">Season:</label>
                        <select class="form-control " id="seasonInComingOrder">
                            <option value=1>Summer</option>
                            <option value=2>Winter</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="checkButton" disabled>Check</button>-->
                <button type="button" class="btn btn-primary" id="outInComing">Ok</button>
            </div>
        </div>
    </div>
</div>
<!-------------->

<!-- change date on orders-->
<div class="modal fade" id="changeOrdersDateModal" tabindex="-1" role="dialog" aria-labelledby="changeOrdersDateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="">
            <div class="modal-header">
                <h5 class="modal-title registerModalTitle" >Change Order Date</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert" style="border-radius: 0; margin: -16px -16px 20px; padding: 5px 20px; font-size: 15px; ">
                    All the fields are required
                </div>

                <form>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="regNrChangeOrder" class="col-form-label labelMod">Reg Nr:</label>
                        <input type="text" class="form-control " id="regNrChangeOrder" placeholder="Reg Nr">
                    </div>

                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="emailChangeOrder" class="col-form-label labelMod">Email:</label>
                        <input type="text" class="form-control " id="emailChangeOrder" placeholder="Email">
                    </div>

                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="change_order_date" class="col-form-label" id="label_change_date">Order Date:</label>
                        <br>
                        <input type="text" class="" id="change_order_date" style="width: 49%;">
                        <img src="images/Rolling.gif" class="timeSlotsLoadingDekk" style="width:20px; height:auto; margin:auto; display:block;" />

                        <div id="order_time_container" style="display:none;">
                            <div class="serviceBar inactiveService " style="">
                                11:30
                            </div>
                            <div class="serviceBar inactiveService " style="">
                                12:30
                            </div>
                            <div class="serviceBar activeService " style="">
                                13:30
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="changeOrder">Change Order Date</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="additionalServiceDekkModal" tabindex="-1" role="dialog" aria-labelledby="additionalServiceDekkModal" aria-hidden="true">
    <div class="modal-dialog modal-sm" id="additionalServiceDekkModal1" role="document" style="margin-left: 1rem;">
        <div class="modal-content custom">
            <div class="modal-header">
                <h5 class="modal-title" id="tyreInfoModal">Bestillingsveiledning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <textarea class="form-control" id="additionalServiceText" style="height:250px;">This is additional service text</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- Dintero Modal -->
<div class="modal fade overflow-auto" id="dinteroModal2" tabindex="-1" role="dialog" aria-labelledby="dinteroModal2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="">
      <div class="modal-header">
        <h5 class="modal-title">Betaling</h5>
        <button type="button" class="close" id="dinteroCloseBtn2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="checkout-container2"></div>
      </div>
    </div>
  </div>
</div>
<!-------------->


<div class="modal fade" id="paymentOptionDekkModal" tabindex="-1" role="dialog" aria-labelledby="paymentOptionDekkModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentOptionDekkModalTitle">Betaling Alternativ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" style="margin-bottom:10px;">
                    <label for="paymentOptionDekk" class="col-form-label labelMod" style="width:auto; margin-right:20px;">Velg en betalings måte:</label>
                    <select class="form-control inputModDekk" id="paymentOptionDekk">
                        <option value="payNow">Vipps/Kortbetaling/delbetaling</option>
                        <option value="orgNr">Firmakunde/faktura</option>
                        <!--<option value="payAtShop">Betaling i butikk</option>-->
                    </select>
                </div>
                <div class="form-group orgNrDekk" style="margin-bottom:10px; display:none;">
                    <label for="orgNrDekk" class="col-form-label labelMod">Organisation Nr:</label>
                    <input type="text" class="form-control inputModDekk" id="orgNrDekk" placeholder="Org Nr">
                </div>

                <div class="form-group referenceDekk" style="margin-bottom:10px; display:none;">
                    <label for="referenceDekk" class="col-form-label labelMod">Referance/info:</label>
                    <input type="text" class="form-control inputModDekk" id="referenceDekk" placeholder="Referance/info">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tilbake</button>
                <button type="button" class="btn btn-primary" id="paymentOptionDekkContinue">Fortsett</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="">
            <div class="modal-header">
                <h5 class="modal-title registerModalTitle" id="loginModal" >Customer Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="username" class="col-form-label labelMod">Reg.Nr:</label>
                        <input type="text" class="form-control " id="usernameLogin" placeholder="Reg.Nr">
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="password" class="col-form-label labelMod">Password:</label>
                        <input type="password" class="form-control " id="passwordLogin" placeholder="">
                    </div>
                </form>
                <div class="form-group" style="margin-bottom:10px; display:flex; margin-left:30px;">
                    <a class=" nav-link" class="form-control" href="?p=" data-toggle="modal" data-target="#registerModal" data-type="register" data-title="Registration"  >Sign up </a>
                    <a class=" nav-link" class="form-control" href="?p=" data-toggle="modal" data-target="#forgotPassword" data-type="register" data-title="Registration"  >forgot password?</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="checkButton" disabled>Check</button>-->
                <button type="button" class="btn btn-primary" id="login">Login</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="">
            <div class="modal-header">
                <h5 class="modal-title registerModalTitle" id="registerModal" >Customer Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert" style="border-radius: 0; margin: -16px -16px 20px; padding: 5px 20px; font-size: 15px; ">
                    All the fields are required
                </div>

                <form>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="regNrRegistration" class="col-form-label labelMod">Reg Nr:</label>
                        <input type="text" class="form-control " id="regNrRegistration" placeholder="Reg Nr">
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="username" class="col-form-label labelMod">Username:</label>
                        <input type="text" class="form-control" disabled id="username" placeholder="Username">
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="password" class="col-form-label labelMod">Password:</label>
                        <input type="password" class="form-control " id="password" placeholder="">
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="fullName" class="col-form-label labelMod">Full Name:</label>
                        <input type="text" class="form-control " id="fullName" placeholder="Full Name">
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="email" class="col-form-label labelMod">Email:</label>
                        <input type="text" class="form-control " id="emailRegistration" placeholder="Email">
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="mobileRegistration" class="col-form-label labelMod">Mobile:</label>
                        <input type="text" class="form-control " id="mobileRegistration" placeholder="Mobile">
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="postCode" class="col-form-label labelMod">Post Code:</label>
                        <input type="text" class="form-control " id="postCode" placeholder="Post Code">
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="address" class="col-form-label labelMod">Address:</label>
                        <input type="text" class="form-control " id="address" placeholder="Address">
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label for="city" class="col-form-label labelMod">City:</label>
                        <input type="text" class="form-control " id="city" placeholder="City">
                    </div>
                    <div class="form-group" style="margin-bottom:10px; display:none;">
                        <label for="company" class="col-form-label labelMod">Company:</label>
                        <input type="text" class="form-control " id="company" placeholder="Moss Dekk AS">
                    </div>
                    <div class="form-group" style="margin-bottom:10px; display:none;">
                        <label for="tyres" class="col-form-label labelMod">Number of Tyres:</label>
                        <select class="form-control " id="tyresDekk1">
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-top: 25px; margin-bottom:10px;">
                        <div class="form-control delivery-popup" onclick="deliveryPopup()">
                            levere inn dekk til dekkhotell
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="checkButton" disabled>Check</button>-->
                <button type="button" class="btn btn-primary" id="register">Register</button>
            </div>
        </div>
    </div>
</div>

<!-- delivery infomation Modal -->
<div class="modal fade overflow-auto" id="deliveryPopup" tabindex="-1" role="dialog" aria-labelledby="dinteroModal2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="">
            <div class="modal-header btn-primary" >
                <h5 class="modal-title">Delivery Information</h5>

            </div>
            <div class="modal-body">
                <div class="form-group" style="margin-bottom:10px;">
                    <label for="regNr" class="col-form-label" id="label_regNr">Reg Nr:</label>
                    <input type="text" class="form-control" disabled id="regNrDelivery" >
                </div>
                <div class="form-group " style="margin-bottom:10px;">
                    <label for="" class="col-form-label" id="label_tyreSize">Dekk størrelse:</label>
                    <div class="container" style="padding: 20px;background-color: #8fd19e;">
                        <div class="row">
                            <div class="col-md-4 col-sd-12">
                                <div class="select" ">
                                    Bredde
                                    <select class="deleverySelect tyreSizeOneSelect" data-type="tyreSizeOne" style="">
                                        <?php echo $sizeOne; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sd-12">
                                <div class="select" >
                                    Profil
                                    <select class="deleverySelect tyreSizeTwoSelect" data-type="tyreSizeTwo" style=" ">
                                        <?php echo $sizeTwo; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sd-12">
                                <div class="select">
                                    Dimensjon
                                    <select class="deleverySelect tyreSizeThreeSelect" data-type="tyreSizeThree" style="">
                                        <?php echo $sizeThree; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group " style="margin-bottom:10px;">
                    <label for="delivery_date" class="col-form-label" id="label_delivery_date">Delivery date:</label>
                    <br>
                    <input type="text" class="" id="delivery_date" style="width: 49%;">
                    <input type="text" class="" id="delivery_time" style="width: 49%;">
                </div>
                <div class="form-group " style="margin-bottom:10px;">
                    <label for="season" class="col-form-label" id="label_season">Sesong:</label>
                    <select class="form-control" id="season">
                        <option value=1>Summer</option>
                        <option value=2>Winter</option>
                    </select>
                </div>
                <div class="form-group " style="margin-bottom:10px;">
                    <button type="button" class="form-control" data-toggle="modal" data-target="#warehouseModal" data-type="tyreChange" data-title="Tyre Change" data-price="0" style="background-color: sandybrown;color: white;cursor: pointer;">
                        TYRE CHANGE
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="sendDeliveryInfo" data-dismiss="modal">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>
<!-------------->

<!-- forgot password Modal -->
<div class="modal fade overflow-auto" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="dinteroModal2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="">
            <div class="modal-header btn-primary" >
                <h5 class="modal-title">Forgot Password</h5>

            </div>
            <div class="modal-body">
                <div class="form-group " style="margin-bottom:10px;">
                    <label for="SmsOrEmail" class="col-form-label" id="label_forgetPassword">Enter your PhoneNumber:</label>
                    <input type="number" class="form-control" id="SmsOrEmail" >
                    <a style="color:#007bff; cursor:pointer;" id="isSendEmail" >Or Send to Email?</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="sendPassword" >
                    Send SMS
                </button>
            </div>
        </div>
    </div>
</div>
<!-------------->

<!--<div id="checkout-container"></div>-->

<script>

    var _id;
    var _regNr;
    var _name;
    var _mobile;
    var _email;
    var _addressLocation;
    var _postcodeLocation;
    var _cityLocation;
    var locationID = 0;
    var init = 0;

    var container2 = document.getElementById("checkout-container2");

    var payVariablesDekk = new Array();
    var checkoutVariable = null;

    $('#isSendEmail').on('click', function(){

        if($('#isSendEmail').text().includes('Email'))
        {
            $('#isSendEmail').text('Or send SMS?');
            $('#label_forgetPassword').text('Enter your Email:');
            $('#sendPassword').text('Send Email');
            $('#SmsOrEmail').prop('type','email');
            $('#SmsOrEmail').val('');

        }
        else
        {
            $('#isSendEmail').text('Or send Email?');
            $('#label_forgetPassword').text('Enter your PhoneNumber:');
            $('#sendPassword').text('Send SMS');
            $('#SmsOrEmail').prop('type','number');
            $('#SmsOrEmail').val('');
        }
    });

    $('#forgotPassword').on('hidden.bs.modal', function (e) {
        $('#isSendEmail').text('Or send Email?');
        $('#label_forgetPassword').text('Enter your PhoneNumber:');
        $('#sendPassword').text('Send SMS');
        $('#SmsOrEmail').prop('type','number');
        $('#SmsOrEmail').val('');
    });

    $('#sendPassword').on('click', function(){
        var receiver = $('#SmsOrEmail').val();
        if(receiver == '') return;
        if($('#sendPassword').text().includes('SMS'))
        {
            var url = 'method=forgotPassword&mode=sms&receiver='+ receiver;

        }
        else {
            var url = 'method=forgotPassword&mode=email&receiver='+ receiver;
        }

        fetch(url, function(result) {
            console.log(result);
            var e = JSON.parse(result);

            if(e[0] == 'success') {
                showAlert('success', 'An email has been sent to you with instructions on how to reset your password.');
                $('#forgotPassword').modal('hide');
            }else if(e[0] == 'No user') {
                showAlert('danger', 'No user is registered with this email address!');
            }else if(e[0] == 'Invalid email address') {
                showAlert('danger', 'Invalid email address please type a valid email address!');
            }else {
                showAlert('Technical error, contact Admin');
            }
        });
    });

    function dinteroNewInstanceDekk(session_id, emptyVar = 0){
        $('#dinteroCloseBtn2').hide();

        dintero.embed({
            container: container2,
            sid: session_id,
            language: "no",
            onSession: function(event, checkout) {
                console.log("session", event.session);
                $('#dinteroModal2').modal({
                    show: true,
                    backdrop: 'static',
                    keyboard: false
                });
                $('#warehouseModal').modal('hide');
                hideLoadingBar();
            },
            onPayment: paymentAuthorizeDekk,
            onSessionCancel: function(event, checkout) {
                console.log("href", event.href);
                checkout.destroy();
                $('#dinteroModal2').modal('hide');
                $('#warehouseModal').modal('hide');
            }
        });

        if(emptyVar == 1){
            payVariablesDekk = [];
        }
    }


    $('#dinteroModal2').on('hidden.bs.modal', function (e) {
        if(checkoutVariable)
            checkoutVariable.destroy();
    });

    function paymentAuthorizeDekk(event, checkout) {
        console.log("Hello");
        console.log(event);

        checkoutVariable = checkout;

        //showLoadingBar();

        var servicesURL = '';
        var IDs = variablesDekk['serviceIDs'].split(',');
        IDs.forEach(function (id) {
            if(id == '' || id == ' ' || id == 'undefined') { return true; }
            servicesURL += '&service'+id+'='+variablesDekk['service'+id];
        });

        var payURL = '&txnID=' + event.transaction_id;

        if(variablesDekk['type'] == 'tyreChangeDekkhotell') {
            var url = 'locationID='+variablesDekk['locationID']+'&addressLocation='+variablesDekk['addressLocation']+'&postcodeLocation='+variablesDekk['postcodeLocation']+'&cityLocation='+variablesDekk['cityLocation']+'&method=tyreChangeDekkhotellOrderWithoutLogin&orgNr='+variablesDekk['orgNr']+'&reference='+variablesDekk['reference']+'&paymentMode='+variablesDekk['paymentMode']+'&paymentDone=1&email='+variablesDekk['email']+'&totalTime='+variablesDekk['totalTime']+'&workType=tyreChange&price='+variablesDekk['price']+'&regNr='+variablesDekk['regNr']+'&name='+variablesDekk['name']+'&mobile='+variablesDekk['mobile']+'&date='+variablesDekk['date']+'&serviceIDs='+variablesDekk['serviceIDs']+'&serviceCounts='+variablesDekk['serviceCounts']+'&time='+variablesDekk['time']+'&pCID='+variablesDekk['privateCustomerID']+'&offerID='+variablesDekk['offerID']+'&tyreID='+variablesDekk['tyreID']+'&selType='+variablesDekk['selectedType']+payURL+servicesURL
                +'&password='+variablesDekk['password']
        }else {
            var url = 'locationID='+variablesDekk['locationID']+'&addressLocation='+variablesDekk['addressLocation']+'&postcodeLocation='+variablesDekk['postcodeLocation']+'&cityLocation='+variablesDekk['cityLocation']+'&method=tyreOrderWithoutLogin&paymentDone=1&dekk=1&orgNr='+variablesDekk['orgNr']+'&reference='+variablesDekk['reference']+'&paymentMode='+variablesDekk['paymentMode']+'&tyreID='+variablesDekk['tyreID']+'&totalTime='+variablesDekk['totalTime']+'&workType='+variablesDekk['type']+'&price='+variablesDekk['price']+'&regNr='+variablesDekk['regNr']+'&name='+variablesDekk['name']+'&mobile='+variablesDekk['mobile']+'&date='+variablesDekk['date']+'&serviceIDs='+variablesDekk['serviceIDs']+'&serviceCounts='+variablesDekk['serviceCounts']+'&time='+variablesDekk['time']+'&tyres='+variablesDekk['tyres']+'&email='+variablesDekk['email']+payURL+servicesURL+'&password='+variablesDekk['password'];
        }
        console.log('url:'+url);
        fetch(url, function(result) {
            //dinteroNewInstanceDekk(1); 1// bamboraNewInstanceDekk(1);
            hideLoadingBar();
            var e = JSON.parse(result);
            if(e[0] == 'failed') {
                showAlert('danger', 'Technical error, contact admin');
            }else if(e[0] == 'success') {
                //showAlert('success', 'Successfully placed your order');
                showAlert('success', 'Bestillingen din er nå mottatt og registrert. Du vil snart få e-mail med bekreftelse.');

                saveCustomerInfo(function(result) {
                    window.location.href = "?p=successfulOrder&"+'email='+variablesDekk['email']+'&totalTime='+variablesDekk['totalTime']+'&workType='+variablesDekk['type']+'&price='+variablesDekk['price']+'&regNr='+variablesDekk['regNr']+'&name='+variablesDekk['name']+'&mobile='+variablesDekk['mobile']+'&date='+variablesDekk['date']+'&serviceIDs='+variablesDekk['serviceIDs']+'&serviceCounts='+variablesDekk['serviceCounts']+'&time='+variablesDekk['time']+'&tyres='+variablesDekk['tyres']+servicesURL;
                    variablesDekk = [];
                });
            }else if(e[0] == 'already ordered') {
                showAlert('danger', 'This Reg Nr is already under process');
            }else if(e[0] == 'no work') {
                showAlert('danger', 'This work has not been assigned');
            }else if(e[0] == 'no employee') {
                showAlert('danger', 'No employee available at this time');
            }else if(e[0] == 'no tyre') {
                showAlert('danger', 'No tyre exist with this regNr');
            }

            $('#warehouseModal').modal('hide');
        });

        $('#dinteroCloseBtn2').show();
    }

    function saveCustomerInfo(callback){
        // _id, _regNr, _name, _mobile, _email are global variables defined in this file outside of functions
        var url = 'method=updateCustomer&id='+_id+'&regNr='+_regNr+'&fullName='+_name+'&mobile='+_mobile+'&email='+_email;
        fetch(url, callback);
    }

    // ----------------------------------
    // OLD BAMBORA PAYMENT

    /*
    var payVariablesDekk = new Array();
    var checkoutDekk = new Bambora.ModalCheckout(null);
    checkoutDekk.on(Bambora.Event.Authorize, paymentAuthorizeDekk);
    checkoutDekk.on(Bambora.Event.Close, paymentCloseDekk);
    checkoutDekk.on(Bambora.Event.Cancel, paymentCancelDekk);

    function bamboraNewInstanceDekk(emptyVar) {
        checkoutDekk.destroy();
        checkoutDekk = new Bambora.ModalCheckout(null);
        checkoutDekk.on(Bambora.Event.Authorize, paymentAuthorizeDekk);
        checkoutDekk.on(Bambora.Event.Close, paymentCloseDekk);
        checkoutDekk.on(Bambora.Event.Cancel, paymentCancelDekk);
        if(emptyVar == 1) {
            payVariablesDekk = []; // was payVariablesDekkDekk (typo?)
        }
    }

    function showPaymentModalDekk(token, url) {
        checkoutDekk
            .initialize(token)
            .then(function() {
                // The session has been fetched.
                checkoutDekk.show();
                hideLoadingBar();
                // Since Bambora Checkout has been preloaded, it is shown immediately.
        });

    }

    function paymentCloseDekk(payload) {
        console.log(payload);
        //var interval = setInterval(function () {
            showLoadingBar();

            var servicesURL = '';
            var IDs = variablesDekk['serviceIDs'].split(',');
            IDs.forEach(function (id) {
                if(id == '' || id == ' ' || id == 'undefined') { return true; }
                servicesURL += '&service'+id+'='+variablesDekk['service'+id];
            });

            var payURL = '&amount='+payVariablesDekk['amount']+'&cardNo='+payVariablesDekk['cardNo']+'&currency='+payVariablesDekk['currency']+'&payDate='+payVariablesDekk['date']+'&eci='+payVariablesDekk['eci']+'&feeID='+payVariablesDekk['feeID']+'&hash='+payVariablesDekk['hash']+'&issuerCountry='+payVariablesDekk['issuerCountry']+'&orderID='+payVariablesDekk['orderID']+'&paymentType='+payVariablesDekk['paymentType']+'&reference='+payVariablesDekk['reference']+'&payTime='+payVariablesDekk['time']+'&txnID='+payVariablesDekk['txnID'];

            if(variablesDekk['type'] == 'tyreChangeDekkhotell') {
                var url = 'method=tyreChangeDekkhotellOrderWithoutLogin&orgNr='+variablesDekk['orgNr']+'&paymentMode='+variablesDekk['paymentMode']+'&paymentDone=1&email='+variablesDekk['email']+'&totalTime='+variablesDekk['totalTime']+'&workType=tyreChange&price='+variablesDekk['price']+'&regNr='+variablesDekk['regNr']+'&name='+variablesDekk['name']+'&mobile='+variablesDekk['mobile']+'&date='+variablesDekk['date']+'&serviceIDs='+variablesDekk['serviceIDs']+'&time='+variablesDekk['time']+'&pCID='+variablesDekk['privateCustomerID']+'&offerID='+variablesDekk['offerID']+'&tyreID='+variablesDekk['tyreID']+'&selType='+variablesDekk['selectedType']+payURL;+servicesURL
            }else {
                var url = 'method=tyreOrderWithoutLogin&paymentDone=1&dekk=1&orgNr='+variablesDekk['orgNr']+'&paymentMode='+variablesDekk['paymentMode']+'&tyreID='+variablesDekk['tyreID']+'&totalTime='+variablesDekk['totalTime']+'&workType='+variablesDekk['type']+'&price='+variablesDekk['price']+'&regNr='+variablesDekk['regNr']+'&name='+variablesDekk['name']+'&mobile='+variablesDekk['mobile']+'&date='+variablesDekk['date']+'&serviceIDs='+variablesDekk['serviceIDs']+'&time='+variablesDekk['time']+'&tyres='+variablesDekk['tyres']+'&email='+variablesDekk['email']+payURL+servicesURL;
            }
            fetch(url, function(result) {
                dinteroNewInstanceDekk(1); 1// bamboraNewInstanceDekk(1);
                hideLoadingBar();
                var e = JSON.parse(result);
                if(e[0] == 'failed') {
                    showAlert('danger', 'Technical error, contact admin');
                }else if(e[0] == 'success') {
                    //showAlert('success', 'Successfully placed your order');
                    showAlert('success', 'Bestillingen din er nå mottatt og registrert. Du vil snart få e-mail med bekreftelse.');
                    variablesDekk = [];
                    $('#warehouseModal').modal('hide');
                }else if(e[0] == 'already ordered') {
                    showAlert('danger', 'This Reg Nr is already under process');
                }else if(e[0] == 'no work') {
                    showAlert('danger', 'This work has not been assigned');
                }else if(e[0] == 'no employee') {
                    showAlert('danger', 'No employee available at this time');
                }else if(e[0] == 'no tyre') {
                    showAlert('danger', 'No tyre exist with this regNr');
                }
            });


            //clearInterval(interval);
        //}, 2000);
    }

    function paymentAuthorizeDekk(payload) {
        console.log(payload);
        var e = payload['data'];
        payVariablesDekk['amount'] = e['amount'];
        payVariablesDekk['cardNo'] = e['cardno'];
        payVariablesDekk['currency'] = e['currency'];
        payVariablesDekk['date'] = e['date'];
        payVariablesDekk['eci'] = e['eci'];
        payVariablesDekk['feeID'] = e['feeid'];
        payVariablesDekk['hash'] = e['hash'];
        payVariablesDekk['issuerCountry'] = e['issuercountry'];
        payVariablesDekk['orderID'] = e['orderid'];
        payVariablesDekk['paymentType'] = e['paymenttype'];
        payVariablesDekk['reference'] = e['reference'];
        payVariablesDekk['time'] = e['time'];
        payVariablesDekk['txnID'] = e['txnid'];

        paymentCloseDekk(payload);

    }

    function paymentCancelDekk(payload) {
        console.log(payload);
        bamboraNewInstance(1);
    }*/

    variablesDekk = new Array();
    variablesDekk['timeID'] = 0;
    variablesDekk['paymentDone'] = 0;
    variablesDekk['price'] = 0;

    /*
    $('.frontSelect').on('change', function(e) {
        var season = $('.seasonSelect').find(':selected').val();
        var sizeOne = $('.sizeOneSelect').find(':selected').val();
        var sizeTwo = $('.sizeTwoSelect').find(':selected').val();
        var sizeThree = $('.sizeThreeSelect').find(':selected').val();

        var url = 'method=fetchFrontTyres&season='+season+'&sizeOne='+sizeOne+'&sizeTwo='+sizeTwo+'&sizeThree='+sizeThree;
        showFrontLoading();

        $('.budgetContainer').html('');
        $('.mellomContainer').html('');
        $('.premiumContainer').html('');

        fetch(url, function(result) {
            hideFrontLoading();
            var e = JSON.parse(result);
            if(e[0] == 'success') {
                $('.frontTyresContainer').show();
                $('.budgetContainer').html(e[1]);
                $('.mellomContainer').html(e[2]);
                $('.premiumContainer').html(e[3]);
            }else if(e[0] == 'no entry') {
                showAlert('danger', 'No entries found for these parameters');
            }else {
                //showModal('Error!', 'Some error occurred while fetching for tyres');
                showAlert('danger', 'Some error occurred while fetching for tyres');
            }
        });
    });
    */

    $('#tyreChangeDateTimeDekk').datetimepicker({
        minDate: moment(new Date()).tz('Europe/Oslo').format('YYYY/MM/DD'),
        format: 'YYYY/MM/DD',
        sideBySide: false,
    });

    $('#tyreChangeDateTimeDekk').on('dp.change', function(e) {
        if (($('#locationID').val() == "") || ($('#locationID').val() == 0)) {
            $('#timeSlotsContainerDekk').hide(200).html('');
            showAlert('danger', 'Location are required');
            return false;
            return;
        }
        $('#continueButtonDekk').attr('disabled', true);
        showTimeSlotsDekk(e.date);
    });

    $('#changeOrdersDateModal').on('show.bs.modal', function (e) {
        console.log('changeOrdersDateModal');
        init = 1;
        $('#changeOrdersDateModal').css('z-index', '10030');
        $('.timeSlotsLoadingDekk').hide();
        $('#order_time_container').hide();

    });

    $('#changeOrdersDateModal').on('hide.bs.modal', function(e) {
        init = 0;
    });

    $('#change_order_date').on('dp.change', function(e) {
        if(init == 0)
            return;
        if (($('#regNrChangeOrder').val() == "") || ($('#regNrChangeOrder').val() == 0)) {
            $('#order_time_container').hide(200).html('');
            showAlert('danger', 'Reg Nr are required');
            return false;
            return;
        }
        $('#changeOrder').attr('disabled', true);
        showTimeOrderDate(e.date);
    });

    function showTimeOrderDate(date) {

        var day = moment(date).format('dddd');
        var sendDate = moment(date).format('YYYY/MM/DD');
        var regnr = $('#regNrChangeOrder').val();
        var email = $('#emailChangeOrder').val();

        variablesDekk['time'] = '';
        $('#order_time_container').hide(200).html('');
        $('.timeSlotsLoadingDekk').show(100);

        var url = 'method=fetchTimeOrderSlots&day='+day+'&sendDate='+sendDate+'&regnr='+regnr+'&email='+email;
        fetch(url, function(result) {
            $('.timeSlotsLoadingDekk').hide(200);
            var e = $.parseJSON(result);
            if(e[0] == 'failed') {
                showAlert('danger', 'Technical error, contact admin');
            }else if(e[0] == 'success') {
                variablesDekk['totalTime'] = e[2];
                $('#order_time_container').html(e[1]).show(100);
            }else if(e[0] == 'closed') {
                showAlert('warning', 'The shop will be closed at this date');
            }else if(e[0] == 'no employee') {
                showAlert('warning', 'No employees available at this date');
            }
        });
    }

    function saveTimeDekk(time, timeID) {
        if(time == '') { return; }

        if(variablesDekk['type'] == 'tyreChangeDekkhotell') {
            tyreChangeDekkhotellCheck(time, timeID);
            return;
        }

        variablesDekk['time'] = time;
        $('.dateTimeDekk').removeClass('activeService').addClass('inactiveService');
        $('.dateTimeDekk'+timeID).removeClass('inactiveService').addClass('activeService');

        if(variablesDekk['time'] != '') {
            $('#continueButtonDekk').attr('disabled', false);
        }else {
            $('#continueButtonDekk').attr('disabled', true);
        }
    }

    function saveOrderTime(time, timeID) {
        if(time == '') { return; }

        variables['time'] = time;
        $('.dateTime').removeClass('activeService').addClass('inactiveService');
        $('.dateTime'+timeID).removeClass('inactiveService').addClass('activeService');

        if(variables['time'] != '') {
            $('#changeOrder').removeAttr("disabled");
        }else {
            $('#changeOrder').attr('disabled', true);
        }
    }


    //change order date
    $('#changeOrder').on('click', function(e) {
        var regNrChangeOrder = $('#regNrChangeOrder').val();
        var emailChangeOrder = $('#emailChangeOrder').val();
        var change_order_date = $('#change_order_date').val();
        var newTime = variables['time'];

        if(regNrChangeOrder == '' || emailChangeOrder == '' || change_order_date == '' || newTime == '') {
            showAlert('danger', 'All fields are required');
            return;
        }

        showLoadingBar();
        var url = 'method=changeOrderDate&regNrChangeOrder='+regNrChangeOrder+'&emailChangeOrder='+emailChangeOrder+'&change_order_date='+change_order_date+'&newTime='+newTime+'&totalTime='+variablesDekk['totalTime'];
        console.log('changeOrderDate url:' + url);
        fetch(url, function(result) {
            hideLoadingBar();
            var e = JSON.parse(result);
            if(e[0] == 'success') {
                showAlert('success', 'Your Order Date has been changed successfull');
                $('#changeOrdersDateModal').modal('hide');
            }else if(e[0] == 'no exist') {
                showAlert('danger', 'No exists');
            }else if(e[0] == 'no employee') {
                showAlert('danger', 'no employee');
            }else if(e[0] == 'failed') {
                showAlert('danger', 'failed');
            }else {
                showAlert('Technical error, contact Admin');
            }
        });
    });

    function hideOffer() {
        $('#tyreChangeDekkhotellTyreOffers').hide();
    }

    function acceptOffer(tyreID, selType, privateCustomerID, offerID, und, price) {
        $('.tr_b'+tyreID+', .tr_m'+tyreID+', .tr_p'+tyreID).css('border', 'none');
        $('.tr_'+selType+tyreID).css('border', '2px solid #555');
        $('.acceptButton'+tyreID).show();
        $('.acceptButton_'+selType+tyreID).hide();

        console.log('price:'+price);
        if(variablesDekk['price']  == 0)
            variablesDekk['price'] = parseInt($('#orderPriceDekk').html());
        console.log('previous:'+variablesDekk['price']);
        var total = variablesDekk['price'] + price;
        $('#orderPriceDekk').html(total);

        variablesDekk['selectedType'] = selType;
        variablesDekk['offerID'] = offerID;
        variablesDekk['tyreID'] = tyreID;
        variablesDekk['privateCustomerID'] = privateCustomerID;
    }

    function tyreChangeDekkhotellCheck(time, timeID) {
        variablesDekk['timeID'] = timeID;
        var emptyField = 0;
        $('.inputModDekk').each(function() {
            if($(this).attr('id') == 'orgNrDekk') { return true; }
            if($(this).attr('id') == 'referenceDekk') { return true; }
            if($(this).val() == '') {
                console.log('required fileds:'+$(this).attr('id'));
// 			$(this).css('border', '1px solid red');
                emptyField = 1;
            }
        });
        if(emptyField == 1) {
            //$('#tyreChangeDekkhotellError').html('All fields are required').css('display', 'inline-block');
            showAlert('danger', 'All fields are required');
            return false;
        }

        $('.inputLocation').each(function() {
            if($(this).val() == 0) {
                emptyField = 2;
            }
        });
        if(emptyField == 2) {
            showAlert('danger', 'Location fields are required');
            return false;
        }

        var regNr = $('#regNrDekk').val();
        var name = $('#nameDekk').val();
        var mobile = $('#mobileDekk').val();
        var date = $('#tyreChangeDateTimeDekk').val();

        showLoadingBar();
        var url = 'method=tyreChangeCheckForTyreOffers&totalTime='+variablesDekk['totalTime']+'&workType=tyreChangeDekkhotell&price='+variablesDekk['price']+'&regNr='+regNr+'&name='+name+'&mobile='+mobile+'&date='+date+'&serviceIDs='+variablesDekk['serviceIDs']+'&serviceCounts='+variablesDekk['serviceCounts'];
        fetch(url, function(result) {
            hideLoadingBar();
            var e = JSON.parse(result);
            if(e[0] == 'failed' || e[0] == 'api error') {
                showAlert('danger', 'Technical error, contact admin');
            }else if(e[0] == 'success') {
                showAlert('warning', 'You have a pending tyre offer');

                //display offers
                $('#tyreChangeDekkhotellTyreOffers').html('<hr>'+e[1]+'<hr>');
                //var childHeight = $('#tyreChangeDekkhotellDiv').height();
                //var newHeight = childHeight+100;
                //$('.normalTyreChangeOrderModal').css('transition', '0.3s all').css('height', newHeight+'px');

                variablesDekk['time'] = time;
                variablesDekk['privateCustomerID'] = parseInt(e[2]);
                variablesDekk['tyreID'] = parseInt(e[3]);
                $('.dateTimeDekk').removeClass('activeService').addClass('inactiveService');
                $('.dateTimeDekk'+timeID).removeClass('inactiveService').addClass('activeService');

                if(variablesDekk['time'] != '') {
                    $('#continueButtonDekk').attr('disabled', false);
                }else {
                    $('#continueButtonDekk').attr('disabled', true);
                }
                return true;
            }else if(e[0] == 'empty fields') {
                showAlert('danger', 'All fields are required');
            }else if(e[0] == 'already ordered') {
                showAlert('danger', 'This Reg Nr is already under process');
            }else if(e[0] == 'no work') {
                showAlert('danger', 'This work has not been assigned');
            }else if(e[0] == 'no offer') {
                variablesDekk['time'] = time;
                variablesDekk['privateCustomerID'] = parseInt(e[1]);
                variablesDekk['tyreID'] = parseInt(e[2]);
                $('.dateTimeDekk').removeClass('activeService').addClass('inactiveService');
                $('.dateTimeDekk'+timeID).removeClass('inactiveService').addClass('activeService');

                if(variablesDekk['time'] != '') {
                    $('#continueButtonDekk').attr('disabled', false);
                }else {
                    $('#continueButtonDekk').attr('disabled', true);
                }

                return;
            }else if(e[0] == 'customer not found') {
                showAlert('danger','Ingen kunde funnet for dette RegNr');
            }

            $('#tyreChangeDekkhotellTyreOffers').html('');
            variablesDekk['time'] = '';
            variablesDekk['privateCustomerID'] = 0;
            variablesDekk['tyreID'] = 0;
            $('#continueButtonDekk').attr('disabled', true);
            $('.dateTimeDekk').removeClass('activeService').addClass('inactiveService');
            $('.dateTimeDekk'+timeID).removeClass('activeService').addClass('inactiveService');

            //var childHeight = $('#tyreChangeDekkhotellDiv').height();
            //var newHeight = childHeight+100;
            //$('.normalTyreChangeOrderModal').css('transition', '0.3s all').css('height', newHeight+'px');
            return false;
        });
    }

    function tyreChangeDekkhotellOrder() {
        var emptyField = 0;
        $('.inputModDekk').each(function() {
            if($(this).attr('id') == 'orgNrDekk') { return true; }
            if($(this).attr('id') == 'referenceDekk') { return true; }
            if($(this).val()  == '') {
                //$(this).css('border', '1px solid red');
                emptyField = 1;
            }
        });
        if(emptyField == 1) {
            //$('#tyreChangeDekkhotellError').html('All fields are required').css('display', 'inline-block');
            showAlert('danger', 'All fields are required');
            return;
        }

        $('.inputLocation').each(function() {
            if($(this).val() == 0) {
                emptyField = 2;
            }
        });
        if(emptyField == 2) {
            showAlert('danger', 'Location fields are required');
            return false;
        }
        $('#paymentOptionDekkModal').modal('hide');

        var regNr = variablesDekk['regNr'] = $('#regNrDekk').val();
        var name = variablesDekk['name'] = $('#nameDekk').val();
        var mobile = variablesDekk['mobile'] = $('#mobileDekk').val();
        var date = variablesDekk['date'] = $('#tyreChangeDateTimeDekk').val();
        var email = variablesDekk['email'] = $('#emailDekk').val();

        var password =variablesDekk['password'] =  $('passDekk').val();

        var locationID =variablesDekk['locationID'] = $("#locationID").val();
        var addressLocation =variablesDekk['addressLocation'] =  $("#addressLocation").val();
        var postcodeLocation =variablesDekk['postcodeLocation'] =  $("#postcodeLocation").val();
        var cityLocation =variablesDekk['cityLocation'] =  $("#cityLocation").val();

        var season = $(".seasonSelect option:selected").text();
        var purchase_data = $(".sizeOneSelect option:selected").text()+"/"+$(".sizeTwoSelect option:selected").text()+"-"+$(".sizeThreeSelect option:selected").text();
        console.log(purchase_data);
        variablesDekk['workType'] = 'tyreChangeDekkhotell';

        var servicesURL = '';
        var IDs = variablesDekk['serviceIDs'].split(',');
        IDs.forEach(function (id) {
            if(id == '' || id == ' ' || id == 'undefined') { return true; }
            servicesURL += '&service'+id+'='+variablesDekk['service'+id];
        });
        var paymentMode = variablesDekk['paymentMode'];
        var orgNr = variablesDekk['orgNr'];
        var reference = variablesDekk['reference'];

        showLoadingBar();

        var url = 'locationID='+locationID+'&addressLocation='+addressLocation+'&postcodeLocation='+postcodeLocation+'&cityLocation='+cityLocation+'&method=tyreChangeDekkhotellOrderWithoutLogin&paymentDone=0&orgNr='+orgNr+'&reference='+reference+'&paymentMode='+paymentMode+'&email='+email+'&totalTime='+variablesDekk['totalTime']+'&workType=tyreChange&price='+variablesDekk['price']+'&regNr='+regNr+'&name='+name+'&mobile='+mobile+'&date='+date+'&serviceIDs='+variablesDekk['serviceIDs']+'&serviceCounts='+variablesDekk['serviceCounts']+'&time='+variablesDekk['time']+'&pCID='+variablesDekk['privateCustomerID']+'&offerID='+variablesDekk['offerID']+'&tyreID='+variablesDekk['tyreID']+'&selType='+variablesDekk['selectedType']+servicesURL;

        fetch(url, function(result) {
            var e = JSON.parse(result);
            if(e[0] == 'success') {
                //showAlert('success','Successfully placed your order');
                showAlert('success', 'Bestillingen din er nå mottatt og registrert. Du vil snart få e-mail med bekreftelse.');
                //closeModal();
                $('#paymentOptionDekkModal, #warehouseModal').modal('hide');
                location.reload(true);
                hideLoadingBar();
                return true;
            }else if(e[0] == 'customer not found') {
                showAlert('danger', 'No customer found for these details');
            }else if(e[0] == 'failed') {
                showAlert('danger', 'Some error occurred');
            }else if(e[0] == 'already ordered') {
                showAlert('danger', 'This tyre has already been ordered');
            }else if(e[0] == 'no work') {
                showAlert('danger', 'This work has not been assigned');
            }else if(e[0] == 'no employee') {
                showAlert('danger', 'No employee available at the selected time');
            }else if(e[0] == 'paySessionSuccess') {
                var token = e[1];
                var url = e[2];
                //showPaymentModalDekk(token, url);
                dinteroNewInstanceDekk(token);
                hideLoadingBar();
                return true;
            }
            if(e[0] != 'paySessionSuccess') { hideLoadingBar(); }

            var timeID = variablesDekk['timeID'];
            $('#tyreChangeDekkhotellTyreOffers').html('');
            variablesDekk['time'] = '';
            variablesDekk['privateCustomerID'] = 0;
            variablesDekk['tyreID'] = 0;
            $('#continueButtonDekk').attr('disabled', true);
            $('.dateTimeDekk').removeClass('activeService').addClass('inactiveService');
            $('.dateTimeDekk'+timeID).removeClass('activeService').addClass('inactiveService');

            //var childHeight = $('#tyreChangeDekkhotellDiv').height();
            //var newHeight = childHeight+100;
            //$('.normalTyreChangeOrderModal').css('transition', '0.3s all').css('height', newHeight+'px');
            return false
        });
    }

    function showTimeSlotsDekk(date) {

        var day = moment(date).format('dddd');
        var sendDate = moment(date).format('YYYY/MM/DD');
        var locationID=$('#locationID').val();

        variablesDekk['time'] = '';
        $('#timeSlotsContainerDekk').hide(200).html('');
        $('.timeSlotsLoadingDekk').show(100);
        console.log('locationID:'+locationID);

        var url = 'method=getTimeSlots&type=dekk&day='+day+'&serviceIDs='+variablesDekk['serviceIDs']+'&serviceCounts='+variablesDekk['serviceCounts']+'&date='+sendDate+'&locationID='+locationID+'&workType='+variablesDekk['type'];
        fetch(url, function(result) {
            $('.timeSlotsLoadingDekk').hide(200);
            var e = $.parseJSON(result);
            if(e[0] == 'failed') {
                showAlert('danger', 'Technical error, contact admin');
            }else if(e[0] == 'success') {
                variablesDekk['totalTime'] = e[2];
                $('#timeSlotsContainerDekk').html(e[1]).show(100);
            }else if(e[0] == 'closed') {
                showAlert('warning', 'The shop will be closed at this date');
            }else if(e[0] == 'no employee') {
                showAlert('warning', 'No employees available at this date');
            }
        });
    }

    function saveServiceDekk(serviceID, price, e) {
        if(serviceID == 0) {
            if (!e) var e = window.event;
            e.cancelBubble = true;
            if (e.stopPropagation) e.stopPropagation();
            return;
        }
        $('#tyreChangeDateTimeDekk').val('');
        $('#timeSlotsContainerDekk').html('');
        $('#continueButtonDekk').attr('disabled', true);
        variablesDekk['time'] = '';
        variablesDekk['totalTime'] = 0;

        if(variablesDekk['serviceIDs'] == '') {
            variablesDekk['servicePrice'] += (price * variablesDekk['totalTyres']);
            //variablesDekk['price'] += (price * variablesDekk['totalTyres']);
            //$('#orderPrice').html(variablesDekk['price']);
            variablesDekk['serviceIDs'] = serviceID+',';
            variablesDekk['serviceUnitPrice'] += price;
            var maxNum = parseInt($('#maxNumDekk'+serviceID).find(':selected').val());
            variablesDekk['service'+serviceID] = price * maxNum;
            variablesDekk['price'] += variablesDekk['service'+serviceID];
            // $('#orderPriceDekk').html(variablesDekk['price']);
        }
        else {
            var present = 0;
            var IDs = variablesDekk['serviceIDs'].split(',');
            IDs.forEach(function (id) {
                if(id == serviceID) { present = 1; return; }
            });

            if(present == 0) {
                variablesDekk['serviceIDs'] += serviceID+',';
                variablesDekk['servicePrice'] += (price * variablesDekk['totalTyres']);
                //variablesDekk['price'] += (price * variablesDekk['totalTyres']);
                //$('#orderPrice').html(variablesDekk['price']);
                variablesDekk['serviceUnitPrice'] += price;

                var maxNum = parseInt($('#maxNumDekk'+serviceID).find(':selected').val());
                variablesDekk['service'+serviceID] = price * maxNum;
                variablesDekk['price'] += variablesDekk['service'+serviceID];
                // $('#orderPriceDekk').html(variablesDekk['price']);
            }else {
                $('.serviceDekk'+serviceID).removeClass('activeService');
                var newServiceIDs = variablesDekk['serviceIDs'].replace(serviceID+',', '');
                variablesDekk['serviceIDs'] = newServiceIDs;
                //	variablesDekk['price'] -= (price * variablesDekk['totalTyres']);
                variablesDekk['servicePrice'] -= (price * variablesDekk['totalTyres']);
                variablesDekk['serviceUnitPrice'] -= price;
                variablesDekk['price'] -= variablesDekk['service'+serviceID];
                // $('#orderPriceDekk').html(variablesDekk['price']);
                variablesDekk['service'+serviceID] = undefined;
                return;
            }
        }

        $('.serviceDekk'+serviceID).addClass('activeService');
    }

$('#warehouseModal').on('show.bs.modal', function (e) {
    console.log('warehouseModal');
    var url="";
    variablesDekk = [];
    variablesDekk['timeID'] = 0;
    variablesDekk['paymentDone'] = 0;
    variablesDekk['serviceCounts'] = '';

	var button = $(e.relatedTarget);
    $('#warehouseModal').css('z-index', '10030');
    $('#additionalServiceDekkModal').css('z-index', '10030');
	$('#continueButtonDekk').attr('disabled', true);
	$('.warehouseModalTitle').html(button.data('title'));
	variablesDekk['type'] = button.data('type');
	$('#tyreChangeDekkHotellStore').val(variablesDekk['type']);
	console.log('work type:' + variablesDekk['type']);

        if(variablesDekk['started'] != 1) {
            //variablesDekk['price'] = parseInt(button.data('price'));
            variablesDekk['price'] = 0;
            variablesDekk['pricePerUnit'] = variablesDekk['price'];
            variables['originalPrice'] = parseInt(button.data('price'));
            // $('#orderPriceDekk').html(variablesDekk['price']);
            $('#orderPriceDekk').html('0');
            variablesDekk['serviceIDs'] = '';
            variablesDekk['time'] = '';
            variablesDekk['totalTime'] = 0;
            //variablesDekk['tyreID'] = parseInt(button.data('tyreid'));
            variablesDekk['tyreID'] = 0;
            variablesDekk['servicePrice'] = 0;
            variablesDekk['totalTyres'] = 1;
            variablesDekk['serviceUnitPrice'] = 0;

            $('.servicesLoadingDekk').show(200);
            $('#servicesContainerDekk').hide();
            $('.timeSlotsLoadingDekk').hide();
            $('#timeSlotsContainerDekk').hide();

            // get price also
            url = 'method=getServices&type=dekk&workType='+variablesDekk['type'];
            console.log('url:'+url);
            fetch(url, function(result) {
                var e = JSON.parse(result);
                if(e[0] == 'success') {
                    $('.servicesLoadingDekk').hide();
                    $('#servicesContainerDekk').html(e[1]).show(200);//services
                    // $('#orderPriceDekk').html(e[2]);
                    $('#orderPriceDekk').html('0');
                    $('#tyreChangeLocation').html(e[3]);//location
                    variablesDekk['started'] = 1;
                    variablesDekk['price'] = parseInt(e[2]);//price
                    var activated = e[4];
                    console.log('activated:'+activated);
                    $('#additionalServiceText').html(e[5]);//services
                    if(activated == 1){
                        $('#additionalServiceDekkModal').modal('show');
                        $(".serviceBarChk").each(function() {
                            if($(this).is(':checked')) {
                                //add service to variablesDekk
                                var fid = $(this).data('id');
                                var dropValue = parseInt($('#maxNumDekk'+fid + ' option:selected').val());
                                variablesDekk['serviceIDs'] +=  ',' + fid;
                                variablesDekk['serviceCounts'] +=  ',' + dropValue;
                                console.log('serviceIDs:' + variablesDekk['serviceIDs']);
                                console.log('serviceCounts:' + variablesDekk['serviceCounts']);
                                //add service price into price
                                variablesDekk['price'] = parseInt($('#orderPriceDekk').html());
                                total = variablesDekk['price'] + parseInt($('#price'+fid).html());
                                $('#orderPriceDekk').html(total);
                            }
                        });
                    }
                }else {
                    showAlert('danger', 'Some error occurred, inform admin');
                }
            });
        }


    });

    $('#continueButtonDekk').on('click', function() {
        console.log('warehouseModal continue button dekk' + $("#addressLocation").val());
        var emptyField = 0;
        var emptyServiceField = 0;
        $('.inputModDekk').each(function() {
            if($(this).attr('id') == 'orgNrDekk') { return true; }
            if($(this).attr('id') == 'referenceDekk') { return true; }
            if($(this).val()== '') {
                //$(this).css('border', '1px solid red');
                emptyField = 1;
                console.log('id:'+ $(this).attr('id'));
            }
        });
        if(emptyField == 1) {
            //showModal('Empty fields', 'All the fields are required');
            showAlert('danger', 'All fields are required');
            return;
        }

        $('.serviceBarChk').each(function() {
            console.log('act:'+$(this).data('activated'));
            if(($(this).data('activated') == 0) || ($(this).data('activated') === 'undefined')) { return false; }
            if(!$(this).is(":checked")){
                console.log('acta:'+$(this).data('activated'));
                emptyServiceField = 1;
            }
        });
        if(emptyServiceField == 1) {
            showAlert('danger', 'Must Select Activated Service');
            return;
        }
        _regNr = $('#regNrDekk').val();
        _name = $('#nameDekk').val();
        _mobile = $('#mobileDekk').val();
        _email = $('#emailDekk').val();
        // var password = $('#passDekk').val();
        //location parameter
        _addressLocation = $('#addressLocation').val();
        _postcodeLocation = $('#postcodeLocation').val();
        _cityLocation = $('#cityLocation').val();
        variablesDekk['price'] = parseInt($('#orderPriceDekk').html());

        /* DISABLING PASSWORD CHECK:
        -----------------------------------------------
            var url = 'method=checkPassword&password='+password+'&regNr='+regNr;
        fetch(url, function(result) {


            if(result == 'failed') {
                showAlert('danger','Reg Nr or password is wrong');
                return;
            }else if(result == 'success') {
        */
        $('#paymentOptionDekkModal').css('z-index', '10030');
        $('.modal-backdrop').css('z-index', '10020');
        $('#paymentOptionDekkModal').modal({
            show: true,
            backdrop: false
        });
        variablesDekk['paymentMode'] = 'payNow';
        variablesDekk['orgNr'] = '';
        variablesDekk['reference'] = '';
        $('#paymentOptionDekk').val('payNow');
        $('.orgNrDekk').hide();
        $('.referenceDekk').hide();
        $('#orgNrDekk').val('');
        $('#referenceDekk').val('');
        //	}


        //});

    }); //tyreChangeOrderDekk(); });

    $('#paymentOptionDekkModal').on('hide.bs.modal', function(e) {
        $('.modal-backdrop').css('z-index', '10000');
        $('#paymentOptionDekk').val('payNow');
        $('.orgNrDekk').hide();
        $('.referenceDekk').hide();
        $('#orgNrDekk').val('');
        $('#referenceDekk').val('');
        variablesDekk['orgNr'] = '';
        variablesDekk['reference'] = '';
        //variablesDekk['paymentMode'] = 'payNow';
    });

    function tyreChangeOrderDekk() {
        var emptyField = 0;
        $('.inputModDekk').each(function() {
            if($(this).attr('id') == 'orgNrDekk') { return true; }
            if($(this).attr('id') == 'referenceDekk') { return true; }
            if($(this).val() == '') {
                //$(this).css('border', '1px solid red');
                console.log('id:'+$(this).attr('id'));
                console.log('value:'+$(this).val());
                emptyField = 1;
            }
        });
        if(emptyField == 1) {
            //showModal('Empty fields', 'All the fields are required');
            showAlert('danger', 'All fields are required: tyreChangeOrderDekk');
            return;
        }

        $('.inputLocation').each(function() {
            if($(this).val() == 0) {
                console.log('id:'+$(this).attr(id));
                emptyField = 2;
            }
        });
        if(emptyField == 2) {
            showAlert('danger', 'Location fields are required');
            return false;
        }

        $('#paymentOptionDekkModal').modal('hide');

        var regNr = variablesDekk['regNr'] = $('#regNrDekk').val();
        var name = variablesDekk['name'] = $('#nameDekk').val();
        var mobile = variablesDekk['mobile'] = $('#mobileDekk').val();
        var date = variablesDekk['date'] = $('#tyreChangeDateTimeDekk').val();
        var tyres = variablesDekk['tyres'] = $('#tyresDekk').find(':selected').val();
        var email = variablesDekk['email'] = $('#emailDekk').val();
        var type = variablesDekk['type'] = $('#tyreChangeDekkHotellStore').val();
        var paymentMode = variablesDekk['paymentMode'];
        var orgNr = variablesDekk['orgNr'];
        var reference = variablesDekk['reference'];

        var locationID =variablesDekk['locationID'] =  $("#locationID").val();
        var addressLocation =variablesDekk['addressLocation'] =  $("#addressLocation").val();
        var postcodeLocation =variablesDekk['postcodeLocation'] =  $("#postcodeLocation").val();
        var cityLocation =variablesDekk['cityLocation'] =  $("#cityLocation").val();

        var servicesURL = '';
        var IDs = variablesDekk['serviceIDs'].split(',');
        IDs.forEach(function (id) {
            if(id == '' || id == ' ' || id == 'undefined') { return true; }
            servicesURL += '&service'+id+'='+variablesDekk['service'+id];
        });

        showLoadingBar();
        var url = 'locationID='+locationID+'&addressLocation='+addressLocation+'&postcodeLocation='+postcodeLocation+'&cityLocation='+cityLocation+'&method=tyreOrderWithoutLogin&paymentDone=0&dekk=1&orgNr='+orgNr+'&reference='+reference+'&paymentMode='+paymentMode+'&tyreID='+variablesDekk['tyreID']+'&email='+email+'&totalTime='+variablesDekk['totalTime']+'&workType='+type+'&price='+variablesDekk['price']+'&regNr='+regNr+'&name='+name+'&mobile='+mobile+'&date='+date+'&serviceIDs='+variablesDekk['serviceIDs']+'&serviceCounts='+variablesDekk['serviceCounts']+'&time='+variablesDekk['time']+'&tyres='+tyres+servicesURL;
        fetch(url, function(result) {
            var e = $.parseJSON(result);
            if(e[0] == 'failed') {
                showAlert('danger','Technical error, contact admin');
            }else if(e[0] == 'paySessionSuccess') {
                var token = e[1];
                var url = e[2];
                //showPaymentModalDekk(token, url);
                dinteroNewInstanceDekk(token);
            }else if(e[0] == 'empty fields') {
                showAlert('danger','All fields are required');
            }else if(e[0] == 'already ordered') {
                showAlert('danger','This Reg Nr is already under process');
            }else if(e[0] == 'no work') {
                showAlert('danger','This work has not been assigned');
            }else if(e[0] == 'no employee') {
                showAlert('danger','No employee available at this time');
            }else if(e[0] == 'api error') {
                showAlert('danger', 'API error, contact admin');
            }else if(e[0] == 'success') {
                // mode - orgNr || payAtShop
                //showAlert('success', 'Successfully placed your order');
                showAlert('success', 'Bestillingen din er nå mottatt og registrert. Du vil snart få e-mail med bekreftelse.');
                $('.modal').modal('hide');
                window.location.href = "?p=successfulOrder&"+'email='+email+'&totalTime='+variablesDekk['totalTime']+'&workType='+type+'&price='+variablesDekk['price']+'&regNr='+regNr+'&name='+name+'&mobile='+mobile+'&date='+date+'&serviceIDs='+variablesDekk['serviceIDs']+'&time='+variablesDekk['time']+'&tyres='+tyres+servicesURL;
                variablesDekk = [];
                //location.reload(true);
            }

            if(e[0] != 'paySessionSuccess') { hideLoadingBar(); }
        });

    }

    $('#warehouseModal').on('hidden.bs.modal', function (e) {

        $('#regNrDekk').val('');
        $('#nameDekk').val('');
        $('#mobileDekk').val('');
        $('#emailDekk').val('');
        $('#passDekk').val('');
        $('#tyreChangeDateTimeDekk').val('');
        $('#servicesContainerDekk').html('');
        $('#timeSlotsContainerDekk').html('');
        $('#orderPriceDekk').html('');
        $('#continueButtonDekk').attr('disabled', true);
        //variablesDekk = [];
        //location parameter
        // $('#addressLocation').val('');
        // $('#postcodeLocation').val('');
        // $('#cityLocation').val('');
        // locationID = 0;

    });

    //when change number of tyresdekk
    $('#tyresDekk').on('change', function() {
        var tyres = parseInt($(this).find(':Selected').val());
        variablesDekk['totalTyres'] = tyres;
        variablesDekk['servicePrice'] = variablesDekk['serviceUnitPrice'] * tyres;
        //var totalPrice = (variablesDekk['pricePerUnit'] * tyres) + variablesDekk['servicePrice'];

        var totalServicePrice = 0;
        var IDs = variablesDekk['serviceIDs'].split(',');
        IDs.forEach(function (id) {
            if(id == '' || id == ' ' || id == undefined) { return true; }
            totalServicePrice += parseInt(variablesDekk['service'+id]);
        });

        var totalPrice = (variablesDekk['pricePerUnit'] * tyres) + totalServicePrice;
        variablesDekk['price'] = totalPrice;
        $('#orderPriceDekk').html(totalPrice);
    });

    $('#regNrRegistration').on('input', function(){
        $('#username').val($('#regNrRegistration').val());
        $('#regNrDelivery').val($('#regNrRegistration').val());

    });

    function saveMaxNumDekk(i, price) {
        var maxNum = $('#maxNumDekk'+i).find(':selected').val();

        var present = 0;
        var IDs = variablesDekk['serviceIDs'].split(',');
        IDs.forEach(function (id) {
            if(id == i) { present = 1; return; }
        });

        if(isset(variablesDekk['service'+i]) && present == 1) {
            variablesDekk['price'] -= variablesDekk['service'+i];
            variablesDekk['service'+i] = maxNum * price;
            //variablesDekk['servicePrice'] += price * maxNum;
            variablesDekk['price'] += variablesDekk['service'+i];
            $('#orderPriceDekk').html(variablesDekk['price']);
        }else {
            variablesDekk['service'+i] = undefined;
        }
    };

    $('#paymentOptionDekk').on('change', function(e) {
        var paymentMode = $(this).find(':selected').val();
        $('.orgNrDekk').hide(200);
        $('.referenceDekk').hide(200);
        if(paymentMode == 'orgNr') {
            variablesDekk['paymentMode'] = 'orgNr';
            // show orgNr input and verify
            $('.orgNrDekk').show(200);
            $('.referenceDekk').show(200);
        }else if(paymentMode == 'payAtShop') {
            // skip bambora.. save order details
            variablesDekk['paymentMode'] = 'payAtShop';
        }else if(paymentMode == 'payNow') {
            //proceed normally.. call tyreChangeOrder()
            variablesDekk['paymentMode'] = 'payNow';
        }

    });

    //when click payment button
    $('#paymentOptionDekkContinue').on('click', function(e) {
        var mode = variablesDekk['paymentMode'];
        variablesDekk['price'] =  $('#orderPriceDekk').html();
        console.log(variablesDekk['type']);
        if(mode == 'payNow') {
            if(variablesDekk['type'] == 'tyreChangeDekkhotell') {
                tyreChangeDekkhotellOrder();
            }else {
                tyreChangeOrderDekk();
            }
        }else if(mode == 'payAtShop') {
            if(variablesDekk['type'] == 'tyreChangeDekkhotell') {
                tyreChangeDekkhotellOrder();
            }else {
                tyreChangeOrderDekk();
            }
        }else if(mode == 'orgNr') {

            var orgNr = $('#orgNrDekk').val();
            var reference = $('#referenceDekk').val();
            if(orgNr == '') {
                showAlert('danger', 'Organisation number required');
                return;
            }
            if(reference == '') {
                showAlert('danger', 'reference required');
                return;
            }
            variablesDekk['orgNr'] = orgNr;
            variablesDekk['reference'] = reference;
            verifyOrgNrDekk(orgNr, reference);
        }
    });

    function verifyOrgNrDekk(orgNr, reference) {
        $('#paymentOptionDekkModal').css('z-index', '10010');
        $('.modal-backdrop').css('z-index', '10000');
        showLoadingBar();
        var url = 'method=verifyOrgNr&orgNr='+orgNr+'&reference='+reference+'&dekk=1';
        fetch(url, function(result) {
            hideLoadingBar();
            var e = JSON.parse(result);
            if(e[0] == 'success') {
                $('#paymentOptionDekkModal').modal('hide');
                variablesDekk['paymentMode'] = 'orgNr';
                variablesDekk['orgNr'] = orgNr;
                variablesDekk['reference'] = reference;
                if(variablesDekk['type'] == 'tyreChangeDekkhotell') {
                    tyreChangeDekkhotellOrder();
                }else {
                    tyreChangeOrderDekk();
                }
            }else if(e[0] == 'incorrect') {
                showAlert('danger', 'Incorrect organisation number');
            }else {
                showAlert('danger', 'Error verfying organisation number');
            }

            if(e[0] != 'success') {
                $('#paymentOptionDekkModal').css('z-index', '10030');
                $('.modal-backdrop').css('z-index', '10020');
            }
        });

    }

    $('#register').on('click', function(e) {
        var username = $('#username').val();
        var password = $('#password').val();
        var fullName = $('#fullName').val();
        var regNr = $('#regNrRegistration').val();
        var mobile = $('#mobileRegistration').val();
        var postCode = $('#postCode').val();
        var address = $('#address').val();
        var city = $('#city').val();
        var email = $('#emailRegistration').val();

        // devlivery information
        var delivery_date = $('#delivery_date').val();
        var delivery_time = $('#delivery_time').val();
        var tyreSize = $('.tyreSizeOneSelect' + ' option:selected').val() + '/' + $('.tyreSizeTwoSelect' + ' option:selected').val() + '-' + $('.tyreSizeThreeSelect' + ' option:selected').val();
        var season = $('#season').val();

        if(username == '' || password == '' || fullName == '' || regNr == '' || mobile == '' || postCode == '' || address == '' || city == ''  || delivery_date == '' || delivery_time == '' || tyreSize== '' || season == '') {
            showAlert('danger', 'All fields are required');
            return;
        }

        showLoadingBar();
        var url = 'method=registerCustomer&email='+email+'&username='+username+'&password='+password+'&fullName='+fullName+'&regNr='+regNr+'&mobile='+mobile+'&postCode='+postCode+'&address='+address+'&city='+city+'&delivery_date='+delivery_date+'&delivery_time='+delivery_time+'&tyreSize='+tyreSize+'&season='+season;
        fetch(url, function(result) {
            hideLoadingBar();
            var e = JSON.parse(result);
            if(e[0] == 'success') {
                showAlert('success', 'Your registration has been successfull');
                $('#registerModal').modal('hide');
            }else if(e[0] == 'exists') {
                showAlert('danger', 'Same username already exists');
            }else if(e[0] == 'empty') {
                showAlert('danger', 'All fields are required');
            }else {
                showAlert('Technical error, contact Admin');
            }
        });
    });

    $('#login').on('click', function(e) {
        var username = $('#usernameLogin').val();
        var password = $('#passwordLogin').val();

        if(username == '' || password == '') {
            showAlert('danger', 'Username & password is required');
            return;
        }

        showLoadingBar();
        var url = 'method=loginCustomer&username='+username+'&password='+password;
        fetch(url, function(result) {
            hideLoadingBar();
            var e = JSON.parse(result);
            if(e[0] == 'success') {
                $('#loginModal').modal('hide');
                showAlert('success', 'Successfully logged you in');
                location.href = 'customer/';
            }else if(e[0] == 'empty') {
                showAlert('danger', 'Username & password is required');
            }else if(e[0] == 'incorrect') {
                showAlert('danger', 'Incorrect username or password');
            }else {
                showAlert('danger', 'Technical error, contact admin');
            }
        });
    });

    function logout() {
        showLoadingBar();
        var url = 'method=logoutCustomer';
        fetch(url, function(result) {
            hideLoadingBar();
            var e = JSON.parse(result);
            if(e[0] == 'success') {
                location.reload(true);
            }else {
                showAlert('danger', 'Error logging you out, contact admin');
            }
        });
    }

    $("#regNrDekk" ).change(function() {

        //init
        $("#nameDekk").val("");
        $("#mobileDekk").val("");
        $("#emailDekk").val("");
        $("#passDekk").val("");
        var regNr = $(this).val();
        if(variablesDekk['type'] == 'tyreChangeDekkhotell') {
            var url = 'method=checkedRegNr&modal=0&regNr='+regNr;
        }else {
            var url = 'method=checkedRegNr&modal=1&regNr='+regNr;
        }

        fetch(url, function(result) {
            var data = JSON.parse(result);
            if(data['result'] == "success"){
                _id = data['id'];
                $("#nameDekk").val(data['name']);
                $("#mobileDekk").val(data['mobile']);
                $("#emailDekk").val(data['email']);
            }
            else{
                showAlert('danger', 'RegNr is not exists');
            }
        });
    });

    //Function what add id and dropvalue into variablesDekk and variables
    function addString(serviceIDs, serviceCounts, fid, dropValue) {
        var searchStr = ',';
        if(serviceIDs.indexOf(searchStr) >= 0){
            var serviceIDsArray = serviceIDs.split(',');
            var serviceCountsArray = serviceCounts.split(',');
            serviceIDsArray = cleanArray(serviceIDsArray);
            serviceCountsArray = cleanArray(serviceCountsArray)
            //remove same element from array
            for(var i=0; i<serviceIDsArray.length; i++){
                var name = serviceIDsArray[i];
                if(name == fid){
                    serviceIDsArray.splice(i, 1);
                    serviceCountsArray.splice(i, 1);
                    break;
                }
            }
            //convert from array to string with comma
            serviceIDs = '';
            serviceCounts = '';
            for(var i=0; i<serviceIDsArray.length; i++){
                serviceIDs +=  ',' + serviceIDsArray[i];
            }
            for(var i=0; i<serviceCountsArray.length; i++){
                serviceCounts +=  ',' + serviceCountsArray[i];
            }
        }

        serviceIDs +=  ',' + fid;
        serviceCounts +=  ',' + dropValue;
        return {ids:serviceIDs,counts:serviceCounts};
    }

    function removeString(serviceIDs, serviceCounts, fid, dropValue) {
        var searchStr = ',';
        if(serviceIDs.indexOf(searchStr) >= 0){
            var serviceIDsArray = serviceIDs.split(',');
            var serviceCountsArray = serviceCounts.split(',');
            serviceIDsArray = cleanArray(serviceIDsArray);
            serviceCountsArray = cleanArray(serviceCountsArray)
            //remove same element from array
            for(var i=0; i<serviceIDsArray.length; i++){
                var name = serviceIDsArray[i];
                if(name == fid){
                    serviceIDsArray.splice(i, 1);
                    serviceCountsArray.splice(i, 1);
                    break;
                }
            }
            //convert from array to string with comma
            serviceIDs = '';
            serviceCounts = '';
            for(var i=0; i<serviceIDsArray.length; i++){
                serviceIDs +=  ',' + serviceIDsArray[i];
            }
            for(var i=0; i<serviceCountsArray.length; i++){
                serviceCounts +=  ',' + serviceCountsArray[i];
            }
        }
        return {ids:serviceIDs,counts:serviceCounts};
    }

    function cleanArray(actual) {
        var newArray = new Array();
        for (var i = 0; i < actual.length; i++) {
            if (actual[i]) {
                newArray.push(actual[i]);
            }
        }
        return newArray;
    }

    $(document).on('change', '#servicesContainerDekk .serviceBarChk', function() {
        var total = 0;
        var fid = $(this).data('id');
        var dropValue = parseInt($('#maxNumDekk'+ fid + ' option:selected').val());
        if(this.checked) {
            var addResult = addString(variablesDekk['serviceIDs'], variablesDekk['serviceCounts'], fid, dropValue);
            variablesDekk['serviceIDs'] =  addResult.ids;
            variablesDekk['serviceCounts'] = addResult.counts;

            //add service price into price
            total = parseInt($('#orderPriceDekk').html()) + parseInt($('#price'+fid).html());
        }
        else{
            var removeResult = removeString(variablesDekk['serviceIDs'], variablesDekk['serviceCounts'], fid, dropValue);
            variablesDekk['serviceIDs'] =  removeResult.ids;
            variablesDekk['serviceCounts'] = removeResult.counts;

            //subtract service price into price
            variablesDekk['price'] = parseInt($('#orderPriceDekk').html());
            if(variablesDekk['price'] > parseInt($('#price'+fid).html()))
                total = variablesDekk['price'] - parseInt($('#price'+fid).html());
            else
                total = variablesDekk['price'] = 0;
        }

        console.log('serviceIDs:' + variablesDekk['serviceIDs']);
        console.log('serviceCounts:' + variablesDekk['serviceCounts']);
        variablesDekk['price'] = total;
        $('#orderPriceDekk').html(total);

    });

    $(document).on('change', '#servicesContainer .serviceBarChk', function() {
        var serviceID="";
        var total = 0;
        var fid = $(this).data('id');
        var dropValue = parseInt($('#maxNumDekk'+ fid + ' option:selected').val());
        if(this.checked) {
            var addResult = addString(variables['serviceIDs'], variables['serviceCounts'], fid, dropValue);
            variables['serviceIDs'] =  addResult.ids;
            variables['serviceCounts'] = addResult.counts;

            //add service price into price
            total = parseInt($('#orderPrice').html()) + parseInt($('#price'+fid).html());
        }
        else{
            var removeResult = removeString(variables['serviceIDs'], variables['serviceCounts'], fid, dropValue);
            variables['serviceIDs'] =  removeResult.ids;
            variables['serviceCounts'] = removeResult.counts;

            //subtract service price into price
            variables['price'] = parseInt($('#orderPrice').html());
            if(variables['price'] > parseInt($('#price'+fid).html()))
                total = variables['price'] - parseInt($('#price'+fid).html());
            else
                total = variables['price'] = 0;
            $('#orderPrice').html(total);
        }
        console.log('serviceIDs:' + variables['serviceIDs']);
        console.log('serviceCounts:' + variables['serviceCounts']);
        variables['price'] = total;
        $('#orderPrice').html(total);

    });

    $(document).on('change', '#servicesContainerDekk .serviceBarDropdown', function() {
        var id = $(this).attr('id');
        var dropValue = parseInt($('#'+id + ' option:selected').val());
        var fid = id.substr(10, id.length);
        var price = 0;
        var total = 0;
        var unitprice = parseInt($('#chk'+fid).data('unitprice'));
        //check if check box
        if($('#chk'+fid).is(":checked")){
            var addResult = addString(variablesDekk['serviceIDs'], variablesDekk['serviceCounts'], fid, dropValue);
            variablesDekk['serviceIDs'] =  addResult.ids;
            variablesDekk['serviceCounts'] = addResult.counts;

            //get current price
            var curPrice = $('#price'+fid).html();
            if(parseInt($('#orderPriceDekk').html()) > curPrice)
                total = parseInt($('#orderPriceDekk').html()) - parseInt(curPrice);
            else
                total = 0;

            price = dropValue * unitprice;
            $('#price'+fid).text(price);
            console.log('dropValue:'+dropValue);
            variablesDekk['price'] = total + price;
            $('#orderPriceDekk').html(variablesDekk['price']);
        }else {
            price = dropValue * unitprice;
            $('#price'+fid).text(price);
            console.log('dropValue:'+dropValue);
        }
        console.log('serviceIDs:' + variablesDekk['serviceIDs']);
        console.log('serviceCounts:' + variablesDekk['serviceCounts']);
        console.log(fid);
    });

    $(document).on('change', '#servicesContainer .serviceBarDropdown', function() {
        var id = $(this).attr('id');
        var dropValue = parseInt($('#'+id + ' option:selected').val());
        var fid = id.substr(10, id.length);
        var price = 0;
        var total = 0;
        var unitprice = parseInt($('#chk'+fid).data('unitprice'));
        //check if check box
        if($('#chk'+fid).is(":checked")){
            var addResult = addString(variables['serviceIDs'], variables['serviceCounts'], fid, dropValue);
            variables['serviceIDs'] =  addResult.ids;
            variables['serviceCounts'] = addResult.counts;

            //get current price
            var curPrice = $('#price'+fid).html();
            if(parseInt($('#orderPrice').html()) > curPrice)
                total = parseInt($('#orderPrice').html()) - parseInt(curPrice);
            else
                total = 0;

            price = dropValue * unitprice;
            $('#price'+fid).text(price);
            console.log('dropValue:'+dropValue);
            variables['price'] = total + price;
            $('#orderPrice').html(variables['price']);
        }else {
            price = dropValue * unitprice;
            $('#price'+fid).text(price);
            console.log('dropValue:'+dropValue);
        }
        console.log('serviceIDs:' + variables['serviceIDs']);
        console.log('serviceCounts:' + variables['serviceCounts']);
        console.log(fid);
    });

    // When the user clicks on div, open the popup
    function deliveryPopup() {
        $('#deliveryPopup').modal('show');
    }

    function tyreManagementOutComingPopup() {
        $('#tyreManagementOutComingModal').modal('show');
    }

    function tyreManagementInComingPopup() {
        $('#tyreManagementInComingModal').modal('show');
    }

    $('#delivery_date').datetimepicker({
        minDate: moment(new Date()).tz('Europe/Oslo').format('YYYY/MM/DD'),
        format: 'YYYY/MM/DD',
        sideBySide: false,
    });

    $('#delivery_time').datetimepicker({
        minDate: moment(new Date()).tz('Europe/Oslo').format('YYYY/MM/DD'),
        format: 'HH:mm',
        sideBySide: false,
    });

    $('#change_order_date').datetimepicker({
        minDate: moment(new Date()).tz('Europe/Oslo').format('YYYY/MM/DD'),
        format: 'YYYY/MM/DD',
        sideBySide: false,
        widgetPositioning: {
            horizontal: 'auto',
            vertical: 'top'
        }
    });

    $('#deliveryDateInComingOrder').datetimepicker({
        minDate: moment(new Date()).tz('Europe/Oslo').format('YYYY/MM/DD'),
        format: 'YYYY/MM/DD',
        sideBySide: false,
    });

    $('#deliveryTimeInComingOrder').datetimepicker({
        minDate: moment(new Date()).tz('Europe/Oslo').format('YYYY/MM/DD'),
        format: 'HH:mm',
        sideBySide: false,
    });

    $('#pickupDateOutComingOrder').datetimepicker({
        minDate: moment(new Date()).tz('Europe/Oslo').format('YYYY/MM/DD'),
        format: 'YYYY/MM/DD',
        sideBySide: false,
    });

    $('#pickupTimeOutComingOrder').datetimepicker({
        minDate: moment(new Date()).tz('Europe/Oslo').format('YYYY/MM/DD'),
        format: 'HH:mm',
        sideBySide: false,
    });


    //outComing shop customer
    $('#outComing').on('click', function(e) {
        var regNrDeleteCustomer = $('#regNrDeleteCustomer').val();
        var pickupDateDeleteCustomer = $('#pickupDateDeleteCustomer').val();
        var emailDeleteCustomer = $('#emailDeleteCustomer').val();

        if(regNrDeleteCustomer == '' || emailDeleteCustomer == '' || pickupDateDeleteCustomer == '') {
            showAlert('danger', 'All fields are required');
            return;
        }

        showLoadingBar();
        var url = 'method=deleteCustomer&regNrDeleteCustomer='+regNrDeleteCustomer+'&pickupDateDeleteCustomer='+pickupDateDeleteCustomer+'&emailDeleteCustomer='+emailDeleteCustomer;;
        console.log('outComing url:' + url);
        fetch(url, function(result) {
            hideLoadingBar();
            var e = JSON.parse(result);
            if(e[0] == 'success') {
                showAlert('success', 'Your Outcoming has been successfull');
                $('#tyreManagementOutComingModal').modal('hide');
            }else if(e[0] == 'no exists') {
                showAlert('danger', 'No exists');
            }
            else if(e[0] == 'no tyres') {
                showAlert('danger', 'No tyres');
            }else if(e[0] == 'empty') {
                showAlert('danger', 'All fields are required');
            }else {
                showAlert('Technical error, contact Admin');
            }
        });
    });

    $('#outInComing').on('click', function(e) {
        //outComing
        var regNrOutComingOrder = $('#regNrOutComingOrder').val();
        var emailOutComingOrder = $('#emailOutComingOrder').val();
        var pickupDateOutComingOrder = $('#pickupDateOutComingOrder').val();
        var pickupTimeOutComingOrder = $('#pickupTimeOutComingOrder').val();
        //inComing
        var regNrInComingOrder = $('#regNrInComingOrder').val();
        var tyreSize = $('.tyreSizeInOneSelect' + ' option:selected').val() + '/' + $('.tyreSizeInTwoSelect' + ' option:selected').val() + '-' + $('.tyreSizeInThreeSelect' + ' option:selected').val();
        var deliveryDateInComingOrder = $('#deliveryDateInComingOrder').val();
        var deliveryTimeInComingOrder = $('#deliveryTimeInComingOrder').val();
        var seasonInComingOrder = $('#seasonInComingOrder').val();


        if(regNrOutComingOrder == '' || emailOutComingOrder == '' || pickupDateOutComingOrder == '' || pickupTimeOutComingOrder == '' || regNrInComingOrder == '' || tyreSize == '' || deliveryDateInComingOrder == '' || deliveryTimeInComingOrder == '' || seasonInComingOrder == '') {
            showAlert('danger', 'All fields are required');
            return;
        }

        showLoadingBar();
        var url = 'method=inOutComingOrder&regNrOutComingOrder='+regNrOutComingOrder+'&emailOutComingOrder='+emailOutComingOrder+'&pickupDateOutComingOrder='+pickupDateOutComingOrder+'&pickupTimeOutComingOrder='+pickupTimeOutComingOrder+'&regNrInComingOrder='+regNrInComingOrder+'&tyreSize='+tyreSize+'&deliveryDateInComingOrder='+deliveryDateInComingOrder+'&deliveryTimeInComingOrder='+deliveryTimeInComingOrder+'&seasonInComingOrder='+seasonInComingOrder;
        fetch(url, function(result) {
            hideLoadingBar();
            var e = JSON.parse(result);
            if(e[0] == 'success') {
                showAlert('success', 'Your Outcoming has been successfull');
                $('#tyreManagementOutComingModal').modal('hide');
            }else if(e[0] == 'no tyres') {
                showAlert('danger', 'No Tyres');
            }else if(e[0] == 'no exists') {
                showAlert('danger', 'No exists');
            }else if(e[0] == 'empty') {
                showAlert('danger', 'All fields are required');
            }else if(e[0] == 'outComing failed') {
                showAlert('danger', 'outComing failed');
            }else {
                showAlert('Technical error, contact Admin');
            }
        });
    });

    $('#pickupDateDeleteCustomer').datetimepicker({
        minDate: moment(new Date()).tz('Europe/Oslo').format('YYYY/MM/DD'),
        format: 'YYYY/MM/DD',
        sideBySide: false,
    });

</script>
