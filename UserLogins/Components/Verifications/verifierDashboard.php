<?php
require_once('../Header/header.php');

$viewDetails = new ClientsView();
$userDetails = new AgentsController;
$agentsView = new Agentsview;
$deleteUser = new ClientsController;

$deleteUser->forwardToSVO();
$deleteUser->delete_user();
$deleteUser->transfer_fresh();
$deleteUser->direct_dashboard();

$active = '';


if (isset($_POST['view-details'])) {
    $active = 'active';
}

?>
<div>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="../../css/verifierDashboard.css">

</div>
<section class="container-body">
    <header>
        <div class="data-navigation" id="data-navigation">
            <div class="active tabTarget" data-tab-target="#table-details-fresh" id="tabTarget">Fresh</div>
            <div data-tab-target="#table-details-inprocess" class="tabTarget">In Process</div>
            <div data-tab-target="#table-details-return" class="tabTarget">Return</div>
        </div>
    </header>
    <div class="container-1st">
        <div class="container active " data-tab-content id="table-details-fresh">
            <div class="row">
                <div>
                    <table class="table active table-bordered table-striped table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th>Application No</th>
                                <th>Name</th>
                                <th>Contact number</th>
                                <th>Email</th>
                                <th class="th-table">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="view-details" id="view-details">
    <div class="cancel-button">
        <div class="cancel-button-inside" data-cancel-inside id="cancel-button-inside"></div>
    </div>

    <div class="container-information">
        <div class="container-information-child">
            <div class="container-information-left">
                <div class="container-view-appNumber">
                    <label for="view-appNumber">Application Number: </label>
                    <span id="application_no"></span>
                    <input type="hidden" name='id' value="" />
                </div>

                <div class="container-view-name">
                    <label for="view-name">Name: </label>
                    <span id="view-name"></span>
                </div>

                <div class="container-view-address">
                    <label>Address: </label>
                    <span id="address"></span>
                </div>

                <div class="container-view-cNumber">
                    <label for="view-cNumber">Contact Number: </label>
                    <span id="primary_no"></span>
                </div>

                <div class="container-view-altNumber">
                    <label>Alternate Number: </label>
                    <span id="alternate-number"></span>
                </div>

                <div class="container-view-gender">
                    <label>Gender: </label>
                    <span id="gender"></span>
                </div>

                <div class="container-view-email">
                    <label>Email: </label>
                    <span id="email"></span>
                </div>

                <div class="container-view-compName">
                    <label>Company Name: </label>
                    <span id="company_name"></span>
                </div>

                <div class="container-view-position">
                    <label>Position: </label>
                    <span id="position"></span>
                </div>

                <div class="container-view-dateHire">
                    <label>Date Hire: </label>
                    <span id="date_hired"></span>
                </div>

                <div class="container-view-salary">
                    <label>Salary: </label>
                    <span id="salary"></span>
                </div>

                <div class="container-view-bankDetails">
                    <label>Bank Details: </label>
                    <span id="primary_bank"></span>
                </div>

            </div>

            <div class="container-information-right">
                <form action="../../inc/saveRemarksAndAttachment.inc.php" id="form-attachments" method="post" enctype="multipart/form-data">
                    <div class="view-details-right-top">
                        <div class="container-attachment">
                            <fieldset class="fieldAttachment" id="fieldAttachment">
                                <legend>Attachment</legend>
                                <div class="view-uploaded-file">
                                    <a class="btn btn-primary" id="attachment1" href="../../image.php?application_no=&filename=Attachment0" target="_blank" rel="noopener noreferrer">ID</a>

                                    <a class="btn btn-primary" href="../../image.php?application_no=&filename=Attachment1" target="_blank" rel="noopener noreferrer">COID</a>

                                    <a class="btn btn-primary" href="../../image.php?application_no=&filename=Attachment2" target="_blank" rel="noopener noreferrer">POI</a>

                                    <a class="btn btn-primary" href="../../image.php?application_no=&filename=Attachment3" target="_blank" rel="noopener noreferrer">POB</a>

                                    <a class="btn btn-primary" href="../../image.php?application_no=&filename=Attachment4" target="_blank" rel="noopener noreferrer">ATM</a>

                                    <a class="btn btn-primary" href="../../image.php?application_no=&filename=Attachment5" target="_blank" rel="noopener noreferrer">OTHERS</a>
                                </div>
                            </fieldset>
                        </div>

                        <div class="container-textArea">
                            <fieldset class="fTextArea">
                                <legend>Remarks</legend>
                                <textarea class="textArea" name='remarks-field'></textarea>
                            </fieldset>
                        </div>



                        <div class="container-view-button">
                            <button type="submit" class="btn btn-primary" name="save-remarks" id="save-remarks">Save</button>
                            <input type="hidden" name="save-id" id="save-id" />
                            <input type="hidden" name="inprocessValue" value="inprocess">
                            <button type='submit' name='btnInprocess' class='btn btn-success' id='inprocess'>In Process</button>
                            <button type="button" class="btn btn-danger" data-cancel-inside id="bottom-cancel">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <form action="./interviewer.php" method="POST">
            <div class="view-details-right-bottom">
                <input type="submit" class="btn btn-info" name="save-ids" id="save-ids" />

                <input type="hidden" name="application_no" id="app_no" />
            </div>
        </form>
    </div>


</div>
<div class="overlay" id="overlay" data-cancel-inside></div>
<script src="../../Js/verifierDashboard.js"></script>
<script src="../../Js/header.js"></script>
</body>

</html>