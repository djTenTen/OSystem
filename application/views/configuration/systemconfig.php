<div class="main">
    <h1>Configuration Page</h1>

    <br><br>

    <div class="container-fluid">
        <h1>Encoding of Grades:</h1><br><br>
        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        <td class="col-3">
                            <h3>College: </h3>
                        </td>
                        <td class="col-3">
                            <div class="row align-items-center justify-content-center">
                                <?php if ($collegeEncoding['Encoding'] == 'Yes'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-on' style="font-size:40px;color:blue"></span></a></span>
                                <?php }?>
                                <?php if ($collegeEncoding['Encoding'] == 'No'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-off' style="font-size:40px;color:grey"></span></a></span>
                                <?php }?>
                            </div>
                        </td>

                        <td class="col-3">
                            <h3>Junior High: </h3>
                        </td>
                        <td class="col-3">
                            <div class="row align-items-center justify-content-center">
                                <?php if ($juniorhighEncoding['Encoding'] == 'Yes'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-on' style="font-size:40px;color:blue"></span></a></span>
                                <?php }?>
                                <?php if ($juniorhighEncoding['Encoding'] == 'No'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-off' style="font-size:40px;color:grey"></span></a></span>
                                <?php }?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-3">
                            <h3>Senior High: </h3>
                        </td>
                        <td class="col-2">
                            <div class="row align-items-center justify-content-center">
                                <?php if ($seniorhighEncoding['Encoding'] == 'Yes'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-on' style="font-size:40px;color:blue"></span></a></span>
                                <?php }?>
                                <?php if ($seniorhighEncoding['Encoding'] == 'No'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-off' style="font-size:40px;color:grey"></span></a></span>
                                <?php }?>
                            </div>
                        </td>

                        <td class="col-4">
                            <h3>Grade School: </h3>
                        </td>
                        <td class="col-3">
                            <div class="row align-items-center justify-content-center">
                                <?php if ($gradeschoolEncoding['Encoding'] == 'Yes'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-on' style="font-size:40px;color:blue"></span></a></span>
                                <?php }?>
                                <?php if ($gradeschoolEncoding['Encoding'] == 'No'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-off' style="font-size:40px;color:grey"></span></a></span>
                                <?php }?>
                            </div>
                        </td>
                    </tr>
                </table>
                
            </div>
        </div>
    </div>

    <br><br><br>

    <div class="container-fluid">
        <h1>Releasing of Grades:</h1><br><br>
        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        <td class="col-3">
                            <h3>College: </h3>
                        </td>
                        <td class="col-3">
                            <div class="row align-items-center justify-content-center">
                                <?php if ($collegeReleasing['Releasing'] == 'Yes'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-on' style="font-size:40px;color:blue"></span></a></span>
                                <?php }?>
                                <?php if ($collegeReleasing['Releasing'] == 'No'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-off' style="font-size:40px;color:grey"></span></a></span>
                                <?php }?>
                            </div>
                        </td>

                        <td class="col-3">
                            <h3>Junior High: </h3>
                        </td>
                        <td class="col-3">
                            <div class="row align-items-center justify-content-center">
                                <?php if ($juniorhighReleasing['Releasing'] == 'Yes'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-on' style="font-size:40px;color:blue"></span></a></span>
                                <?php }?>
                                <?php if ($juniorhighReleasing['Releasing'] == 'No'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-off' style="font-size:40px;color:grey"></span></a></span>
                                <?php }?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-3">
                            <h3>Senior High: </h3>
                        </td>
                        <td class="col-2">
                            <div class="row align-items-center justify-content-center">
                                <?php if ($seniorhighReleasing['Releasing'] == 'Yes'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-on' style="font-size:40px;color:blue"></span></a></span>
                                <?php }?>
                                <?php if ($seniorhighReleasing['Releasing'] == 'No'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-off' style="font-size:40px;color:grey"></span></a></span>
                                <?php }?>
                            </div>
                        </td>

                        <td class="col-4">
                            <h3>Grade School: </h3>
                        </td>
                        <td class="col-3">
                            <div class="row align-items-center justify-content-center">
                                <?php if ($gradeschoolReleasing['Releasing'] == 'Yes'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-on' style="font-size:40px;color:blue"></span></a></span>
                                <?php }?>
                                <?php if ($gradeschoolReleasing['Releasing'] == 'No'){?>
                                    <a href="#" class="alert-link"> <span class='fas fa-toggle-off' style="font-size:40px;color:grey"></span></a></span>
                                <?php }?>
                            </div>
                        </td>
                    </tr>
                </table>
                
            </div>
        </div>
    </div>
  
</div>