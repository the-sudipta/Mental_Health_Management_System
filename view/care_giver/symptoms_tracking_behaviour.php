<!-- Progress Tracking Modal -->
<div class="modal fade" id="symptomstrackingModal" tabindex="-1" aria-labelledby="symptomstrackingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between w-100">
                <h1 class="modal-title fs-5 " id="exampleModalLabel">List of Patients symptoms</h1>
                <a class="btn btn-success btn-sm" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Add Symptoms</a>
            </div>
            <div class="modal-body">


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Behaviour</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>Mood swings</td>
                            <td>10/05/2023</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Alice Smith</td>
                            <td>Changes in appetite</td>
                            <td>12/18/2023</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Michael Johnson</td>
                            <td>Sleep disturbances</td>
                            <td>06/30/2023</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Emily Brown</td>
                            <td>Difficulty concentrating</td>
                            <td>09/22/2023</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>David Wilson</td>
                            <td>Loss of interest in activities</td>
                            <td>03/14/2023</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Sarah Anderson</td>
                            <td>Feelings of hopelessness or worthlessness</td>
                            <td>07/05/2023</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Matthew Martinez</td>
                            <td>Increased irritability</td>
                            <td>11/29/2023</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Emma Taylor</td>
                            <td>Social withdrawal</td>
                            <td>04/07/2023</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>James Brown</td>
                            <td>Fatigue or lack of energy</td>
                            <td>08/12/2023</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Olivia Jones</td>
                            <td>Physical symptoms without medical cause (headaches, stomachaches, etc.)</td>
                            <td>02/25/2023</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Christopher Davis</td>
                            <td>Suicidal thoughts or self-harming behaviors</td>
                            <td>05/19/2023</td>
                        </tr>

                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Add Patient Symptoms</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form class="row g-3">




                    <div class="col-12">
                        <label for="patient_name" class="form-label" class="form-label">Patient Name</label>
                        <select id="patient_name" required class="form-control">
                            <option value="John Doe">Select</option>
                            <option value="John Doe">John Doe</option>
                            <option value="Alice Smith">Alice Smith</option>
                            <option value="Michael Johnson">Michael Johnson</option>
                            <option value="Emily Brown">Emily Brown</option>
                            <option value="David Wilson">David Wilson</option>
                            <option value="Sarah Anderson">Sarah Anderson</option>
                            <option value="Matthew Martinez">Matthew Martinez</option>
                            <option value="Emma Taylor">Emma Taylor</option>
                            <option value="James Brown">James Brown</option>
                            <option value="Olivia Jones">Olivia Jones</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="Behaviour" class="form-label" class="form-label">Behaviour</label>


                        <div class="symptom form-check">
                            <input type="checkbox" id="mood_swings" class="form-check-input">
                            <label class="form-check-label" for="mood_swings"><span>Mood swings</span></label>
                        </div>

                        <div class="symptom form-check">
                            <input type="checkbox" id="changes_in_appetite" class="form-check-input">
                            <label class="form-check-label" for="changes_in_appetite"><span>Changes in appetite</span></label>
                        </div>

                        <div class="symptom form-check">
                            <input type="checkbox" id="sleep_disturbances" class="form-check-input">
                            <label class="form-check-label" for="sleep_disturbances"><span>Sleep disturbances</span></label>
                        </div>

                        <div class="symptom form-check">
                            <input type="checkbox" id="difficulty_concentrating" class="form-check-input">
                            <label class="form-check-label" for="difficulty_concentrating"><span>Difficulty concentrating</span></label>
                        </div>

                        <div class="symptom form-check">
                            <input type="checkbox" id="loss_of_interest" class="form-check-input">
                            <label class="form-check-label" for="loss_of_interest"><span>Loss of interest in activities</span></label>
                        </div>

                        <div class="symptom form-check">
                            <input type="checkbox" id="feelings_of_hopelessness" class="form-check-input">
                            <label class="form-check-label" for="feelings_of_hopelessness"><span>Feelings of hopelessness or worthlessness</span></label>
                        </div>

                        <div class="symptom form-check">
                            <input type="checkbox" id="increased_irritability" class="form-check-input">
                            <label class="form-check-label" for="increased_irritability"><span>Increased irritability</span></label>
                        </div>

                        <div class="symptom form-check">
                            <input type="checkbox" id="social_withdrawal" class="form-check-input">
                            <label class="form-check-label" for="social_withdrawal"><span>Social withdrawal</span></label>
                        </div>
                        <div class="symptom form-check">
                            <input type="checkbox" id="fatigue_or_lack_of_energy" class="form-check-input">
                            <label class="form-check-label" for="fatigue_or_lack_of_energy"><span>Fatigue or lack of energy</span></label>
                        </div>

                        <div class="symptom form-check">
                            <input type="checkbox" id="physical_symptoms" class="form-check-input">
                            <label class="form-check-label" for="physical_symptoms"><span>Physical symptoms without medical cause (headaches, stomachaches, etc.)</span></label>
                        </div>

                        <div class="symptom form-check">
                            <input type="checkbox" id="suicidal_thoughts" class="form-check-input">
                            <label class="form-check-label" for="suicidal_thoughts"><span>Suicidal thoughts or self-harming behaviors</span></label>
                        </div>
                        <div class="col-md-12">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" required>

                        </div>
                    </div>

                    <div class="col-12">
                        <a class="btn btn-primary w-100" data-bs-target="#symptomstrackingModal" data-bs-toggle="modal">Submit</a>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
