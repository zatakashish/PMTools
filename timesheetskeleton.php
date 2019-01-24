<div class="row">
                                            <div class ="col-lg-4">
                                                
                                                <select id="project" class="custom-select"  >
                                                    <option hidden="" value="">Select Project</option>
                                                    <?php
                                                    
                                                    $sql="SELECT * FROM project_details WHERE status='active' ORDER BY name ASC";
                                                    $result= mysqli_query($conn, $sql);
                                                    while($data= mysqli_fetch_assoc($result)){
                                                        echo '<option value='.$data["name"].'>'.$data["name"].'</option>';
                                                    }
                                                    
                                                    ?>
                                                    
                                                </select> 
                                            </div>
                                            <div class ="col-lg-1"></div>
                                            
                                            
                                            <div class ="col-lg-4">
                                                
                                              
                                                <select id="area" class="custom-select" >
                                                     <option hidden="" value="">Select Area:</option>
                                                    <?php
                                                    
                                                    $sql="SELECT * FROM module ORDER BY property ASC";
                                                    $result= mysqli_query($conn, $sql);
                                                    while($data= mysqli_fetch_assoc($result)){
                                                        echo '<option value='.$data["property"].'>'.$data["property"].'</option>';
                                                    }
                                                    
                                                    ?>
                                                    
                                                </select>
                                               
                                            </div>
                                          
                                            <div class ="col-lg-1">
                                               
                                                <input class="form-control" type="number" placeholder="Hrs" id="time" min="1" max="8" >
                                               
                                             
                                            </div>
                                            
                                            <div class ="col-lg-1">
                                                <label id="status"></label>
                                            </div>
                                        </div>
<br>