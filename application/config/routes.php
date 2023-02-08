<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//USERS
$route['users'] = 'Users_controller/users';
$route['addUser'] = 'Users_controller/addUser';
$route['updateUser/(:any)'] = 'Users_controller/updateUser/$1';
$route['deleteUser/(:any)'] = 'Users_controller/deleteUser/$1';
$route['accountsetting/(:any)'] = 'Users_controller/getuserInfo/$1';
$route['accountsettingsupdate/(:any)'] = 'Users_controller/accountsettingsupdate/$1';
$route['enableuser/(:any)'] = 'Users_controller/enableUser/$1';
$route['disableuser/(:any)'] = 'Users_controller/disableUser/$1';
$route['selectdpt'] = 'Users_controller/selectdpt';
$route['signupcollege'] = 'Users_controller/signupcollege';
$route['signupshs'] = 'Users_controller/signupshs';
$route['signupjs'] = 'Users_controller/signupjs';
$route['signupgs'] = 'Users_controller/signupgs';















//COLLEGE SUBJECTS
$route['subject_college'] = 'Subjects_controller/subject_college';
$route['addCollegeSubjects'] = 'Subjects_controller/addCollegeSubjects';
$route['updateCollegeSubjects/(:any)'] = 'Subjects_controller/updateCollegeSubjects/$1';
$route['deleteCollegeSubjects/(:any)'] = 'Subjects_controller/deleteCollegeSubjects/$1';
//SENIOR HIGH SUBJECTS
$route['subject_seniorhigh'] = 'Subjects_controller/subject_seniorhigh';
$route['addSeniorhighSubjects'] = 'Subjects_controller/addSeniorhighSubjects';
$route['updateSeniorhighSubjects/(:any)'] = 'Subjects_controller/updateSeniorhighSubjects/$1';
$route['deleteSeniorhighSubjects/(:any)'] = 'Subjects_controller/deleteSeniorhighSubjects/$1';
//GRADES SCHOOL SUBJECTS
$route['subject_gradeschool'] = 'Subjects_controller/subject_gradeschool';
$route['addGradeschoolSubjects'] = 'Subjects_controller/addGradeschoolSubjects';
$route['updateGradeschoolSubjects/(:any)'] = 'Subjects_controller/updateGradeschoolSubjects/$1';
$route['deleteGradeschoolSubjects/(:any)'] = 'Subjects_controller/deleteGradeschoolSubjects/$1';
//JUNIORHIGH SUBJECTS
$route['subject_juniorhigh'] = 'Subjects_controller/subject_juniorhigh';
$route['addJuniorhighSubjects'] = 'Subjects_controller/addJuniorhighSubjects';
$route['updateJuniorhighSubjects/(:any)'] = 'Subjects_controller/updateJuniorhighSubjects/$1';
$route['deleteJuniorhighSubjects/(:any)'] = 'Subjects_controller/deleteJuniorhighSubjects/$1';

















//COLLEGE MISCELLANEOUS
$route['miscellaneous_college'] = 'Miscellaneous_controller/miscellaneousCollege';
$route['addCollegeMiscellaneous'] = 'Miscellaneous_controller/addCollegeMiscellaneous';
$route['updateCollegeMiscellaneous/(:any)'] = 'Miscellaneous_controller/updateCollegeMiscellaneous/$1';
$route['deleteCollegeMiscellaneous/(:any)'] = 'Miscellaneous_controller/deleteCollegeMiscellaneous/$1';
//GRADE SCHOOL MISCELLANEOUS
$route['miscellaneous_gradeschool'] = 'Miscellaneous_controller/miscellaneous_gradeschool';
$route['addGradeschoolMiscellaneous'] = 'Miscellaneous_controller/addGradeschoolMiscellaneous';
$route['updateGradeschoolMiscellaneous/(:any)'] = 'Miscellaneous_controller/updateGradeschoolMiscellaneous/$1';
$route['deleteGradeschoolMiscellaneous/(:any)'] = 'Miscellaneous_controller/deleteGradeschoolMiscellaneous/$1';
//JUNIORHIGH MISCELLANEOUS
$route['miscellaneous_juniorhigh'] = 'Miscellaneous_controller/miscellaneous_juniorhigh';
$route['addJuniorhighMiscellaneous'] = 'Miscellaneous_controller/addJuniorhighMiscellaneous';
$route['updateJuniorhighMiscellaneous/(:any)'] = 'Miscellaneous_controller/updateJuniorhighMiscellaneous/$1';
$route['deleteJuniorhighMiscellaneous/(:any)'] = 'Miscellaneous_controller/deleteJuniorhighMiscellaneous/$1';
//SENIORHIGH MISCELLANEOUS
$route['miscellaneous_seniorhigh'] = 'Miscellaneous_controller/miscellaneous_seniorhigh';
$route['addSeniorhighMiscellaneous'] = 'Miscellaneous_controller/addSeniorhighMiscellaneous';
$route['updateSeniorhighMiscellaneous/(:any)'] = 'Miscellaneous_controller/updateSeniorhighMiscellaneous/$1';
$route['deleteSeniorhighMiscellaneous/(:any)'] = 'Miscellaneous_controller/deleteSeniorhighMiscellaneous/$1';
















//CURRICULUM COLLEGE
$route['curriculum_college'] = 'Curriculum_controller/collegeCurriculum';
$route['addCurriculumSubjectsCollege'] = 'Curriculum_controller/addCurriculumSubjectsCollege';
$route['addCurriculumCollege'] = 'Curriculum_controller/addCurriculumCollege';
$route['removeTempSubjectCollege/(:any)'] = 'Curriculum_controller/removeTempSubjectCollege/$1';
$route['deleteCurriculumCollege/(:any)'] = 'Curriculum_controller/deleteCurriculumCollege/$1';
$route['curriculumCollege/(:any)/(:any)/(:any)'] = 'Curriculum_controller/curriculumCollege/$1/$2/$3';
$route['addsubjectcurriculumcollege/(:any)'] = 'Curriculum_controller/addsubjectCurriculumCollege/$1';
$route['deletesubjectcurriculum/(:any)/(:any)'] = 'Curriculum_controller/deleteSubjectCurriculum/$1/$2';


//CURRICULUM SENIOR HIGH
$route['curriculum_seniorhigh'] = 'Curriculum_controller/seniorhighCurriculum';
$route['addCurriculumSubjectsSeniorhigh'] = 'Curriculum_controller/addCurriculumSubjectsSeniorhigh';
$route['removeTempSubjectSeniorhighCurri/(:any)'] = 'Curriculum_controller/removeTempSubjectSeniorhigh/$1';
$route['addCurriculumSeniorhigh'] = 'Curriculum_controller/addCurriculumSeniorhigh';
//CURRICULUM JUNIOR HIGH
$route['curriculum_juniorhigh'] = 'Curriculum_controller/juniorhighCurriculum';
$route['addCurriculumSubjectsJuniorhigh'] = 'Curriculum_controller/addCurriculumSubjectsJuniorhigh';
$route['removeCurriculumTempSubjectJuniorhigh/(:any)'] = 'Curriculum_controller/removeTempSubjectJuniorhigh/$1';
$route['addCurriculumJuniorhigh'] = 'Curriculum_controller/addCurriculumJuniorhigh';
//CURRICULUM GRADESCHOOL
$route['curriculum_gradeschool'] = 'Curriculum_controller/gradeschoolCurriculum';
$route['addCurriculumSubjectsGradeschool'] = 'Curriculum_controller/addCurriculumSubjectsGradeschool';
$route['removeTempSubjectGradeschoolCurri/(:any)'] = 'Curriculum_controller/removeTempSubjectGradeschool/$1';
$route['addCurriculumGradeschool'] = 'Curriculum_controller/addCurriculumGradeschool';
//COLLEGE COURSES
$route['courses'] = 'Courses_controller/courses';
$route['addCourse'] = 'Courses_controller/addCourse';
$route['updateCourse/(:any)'] = 'Courses_controller/updateCourse/$1';
$route['deleteCourse/(:any)'] = 'Courses_controller/deleteCourse/$1';













//ADMISSION COLLEGE
$route['admission_college'] = 'Admission_controller/collegeAdmission';
$route['validate_college/(:any)'] = 'Admission_controller/validatCollege/$1';
$route['updateCollege/(:any)'] = 'Admission_controller/updateCollege/$1';
$route['delete_college/(:any)'] = 'Admission_controller/deleteCollege/$1';
$route['validated_college'] = 'Admission_controller/collegeValidated';
$route['dismiss_college/(:any)'] = 'Admission_controller/dismissCollege/$1';
$route['cbr_college/(:any)'] = 'Admission_controller/cbrCollege/$1';

//ADMISSION SENIORHIGH
$route['admission_seniorhigh'] = 'Admission_controller/seniorhighAdmission';
$route['validate_seniorhigh/(:any)'] = 'Admission_controller/validatSeniorhigh/$1';
$route['updateSeniorhigh/(:any)'] = 'Admission_controller/updateSeniorhigh/$1';
$route['validated_seniorhigh'] = 'Admission_controller/seniorhighValidated';
$route['dismiss_seniorhigh/(:any)'] = 'Admission_controller/dismissSeniorhigh/$1';


//ADMISSION JUNIORHIGH
$route['admission_juniorhigh'] = 'Admission_controller/juniorhighAdmission';
$route['validate_juniorhigh/(:any)'] = 'Admission_controller/validatJuniorhigh/$1';
$route['updateJuniorhigh/(:any)'] = 'Admission_controller/updateJuniorhigh/$1';
$route['validated_juniorhigh'] = 'Admission_controller/juniorhighValidated';
$route['dismiss_juniorhigh/(:any)'] = 'Admission_controller/dismissJuniorhigh/$1';

//ADMISSION GRADESCHOOL
$route['admission_gradeschool'] = 'Admission_controller/gradeschoolAdmission';
$route['validate_gradeschool/(:any)'] = 'Admission_controller/validatGradeschool/$1';
$route['updateGradeschool/(:any)'] = 'Admission_controller/updateGradeschool/$1';
$route['validated_gradeschool'] = 'Admission_controller/gradeschoolValidated';
$route['dismiss_gradeschool/(:any)'] = 'Admission_controller/dismissGradeschool/$1';
















//PROGRAM CHAIR COLLEGE
$route['evaluate_college'] = 'ProgramChair_controller/evaluateCollege';
$route['advice_college/(:any)'] = 'ProgramChair_controller/adviceCollege/$1';
$route['viewcurriculumCollege'] = 'ProgramChair_controller/viewcollegeCurriculum';
$route['removeTempSubjectcollege/(:any)'] = 'ProgramChair_controller/removeTempSubjectcollege/$1';
$route['addsubjectTempCollege'] = 'ProgramChair_controller/addsubjectTemp';
$route['savestudentCollege'] = 'ProgramChair_controller/saveStudentCollege';
$route['collegeStudentinfo'] = 'ProgramChair_controller/collegeStudentInfo';
$route['reevaluatestudent/(:any)'] = 'ProgramChair_controller/reevaluateStudent/$1';
$route['schedule_college'] = 'ProgramChair_controller/sheduleCollege';
$route['editSchedule/(:any)'] = 'ProgramChair_controller/editSchedule/$1';
$route['updateSchedule/(:any)'] = 'ProgramChair_controller/updateSchedule/$1';
$route['collegeEnrolled'] = 'ProgramChair_controller/collegeEnrolled';



$route['pegradecollege'] = 'ProgramChair_controller/PprofCollege';
$route['pviewclasssubjects/(:any)'] = 'ProgramChair_controller/PviewClassSubjects/$1';
$route['pviewclasssubjectsstudentscol/(:any)/(:any)'] = 'ProgramChair_controller/PviewClassSubjectsStudentsCol/$1/$2';



//DEANS COLLEGE
$route['classlist'] = 'Deans_controller/classlist';

















// PRINCIPAL SENIOR HIGH 
$route['evaluate_seniorhigh'] = 'Principal_controller/evaluateSeniorhigh';
$route['advice_seniorhigh/(:any)'] = 'Principal_controller/adviceSeniorhigh/$1';
$route['viewcurriculumSeniorhigh'] = 'Principal_controller/viewSeniorhighCurriculum';
$route['addsubjectTempSeniorhigh'] = 'Principal_controller/addsubjectTempSeniorhigh';
$route['removeTempSubjectSeniorhigh/(:any)'] = 'Principal_controller/removeTempSubjectSeniorhigh/$1';
$route['savestudentSeniorhigh'] = 'Principal_controller/saveStudentSeniorhigh';
$route['seniorhighStudentinfo'] = 'Principal_controller/seniorhighStudentInfo';
$route['schedule_seniorhigh'] = 'Principal_controller/scheduleSeniorhigh';
$route['editScheduleSeniorhigh/(:any)'] = 'Principal_controller/editScheduleSeniorhigh/$1';
$route['updateScheduleSeniorhigh/(:any)'] = 'Principal_controller/updateScheduleSeniorhigh/$1';
$route['reevaluatestudentSeniorhigh/(:any)'] = 'Principal_controller/reevaluatestudentSeniorhigh/$1';
//CLASSLIST
$route['classlistseniorhigh'] = 'Principal_controller/classlistSeniorhigh';
$route['exportclasslistSeniorhigh/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'Principal_controller/exportClasslistSeniorhigh/$1/$2/$3/$4/$5/$6';










//STUDENT ACCESS
$route['studentinfo'] = 'Students_controller/studentsInfo';
$route['schedsubjects'] = 'Students_controller/schedSubjects';
$route['studentsgrades'] = 'Students_controller/studentsGrades';









// EGRADE College
$route['egradecollege'] = 'Egrade_controller/profCollege';
$route['viewclasssubjects/(:any)'] = 'Egrade_controller/viewClassSubjects/$1';
$route['viewclasssubjectsstudentscol/(:any)/(:any)'] = 'Egrade_controller/viewClassSubjectsStudentsCol/$1/$2';
$route['updatesubjectgradecollege/(:any)'] = 'Egrade_controller/updateSubjectGradeCollege/$1';
// EGRADE Seniorhigh
$route['egradeseniorhigh'] = 'Egrade_controller/profSeniorhigh';
$route['viewclasssubjectsshs/(:any)'] = 'Egrade_controller/viewClassSubjectsSeniorhigh/$1';
$route['viewclasssubjectsstudentsshs/(:any)/(:any)'] = 'Egrade_controller/viewClassSubjectsStudentsSHS/$1/$2';
$route['updatesubjectgradeseniorhigh/(:any)'] = 'Egrade_controller/updateSubjectGradeSeniorhigh/$1';
// EGRADE Juniorhigh
$route['egradejuniorhigh'] = 'Egrade_controller/profJuniorhigh';
$route['viewclasssubjectsjhs/(:any)'] = 'Egrade_controller/viewClassSubjectsJuniorhigh/$1';
$route['viewclasssubjectsstudentsjhs/(:any)/(:any)'] = 'Egrade_controller/viewClassSubjectsStudentsJHS/$1/$2';
$route['updatesubjectgradejuniorhigh/(:any)'] = 'Egrade_controller/updateSubjectGradeJuniorhigh/$1';
// EGRADE GRADESCHOOL
$route['egradegradeschool'] = 'Egrade_controller/profGradeschool';
$route['viewclasssubjectsgs/(:any)'] = 'Egrade_controller/viewClassSubjectsGradeschool/$1';
$route['viewclasssubjectsstudentsgs/(:any)/(:any)'] = 'Egrade_controller/viewClassSubjectsStudentsGS/$1/$2';
$route['updatesubjectgradegradeschool/(:any)/(:any)'] = 'Egrade_controller/updateSubjectGradeGradeschool/$1/$2';



// PRINCIPAL JUNIORHIGH 
$route['evaluate_juniorhigh'] = 'Principal_controller/evaluateJuniorhigh';
$route['advice_juniorhigh/(:any)'] = 'Principal_controller/adviceJuniorhigh/$1';
$route['viewcurriculumJuniorhigh'] = 'Principal_controller/viewJuniorhighCurriculum';
$route['addsubjectTempJuniorhigh'] = 'Principal_controller/addsubjectTempJuniorhigh';
$route['removeTempSubjectJuniorhigh/(:any)'] = 'Principal_controller/removeTempSubjectJuniorhigh/$1';
$route['savestudentJuniorhigh'] = 'Principal_controller/saveStudentJuniorhigh';
$route['juniorhighStudentinfo'] = 'Principal_controller/juniorhighStudentinfo';
$route['reevaluatestudentJuniorhigh/(:any)'] = 'Principal_controller/reevaluatestudentJuniorhigh/$1';
$route['schedule_juniorhigh'] = 'Principal_controller/scheduleJuniorhigh';
$route['editScheduleJuniorhigh/(:any)'] = 'Principal_controller/editScheduleJuniorhigh/$1';
$route['updateScheduleJuniorhigh/(:any)'] = 'Principal_controller/updateScheduleJuniorhigh/$1';
//CLASSLIST
$route['classlistjuniorhigh'] = 'Principal_controller/classlistJuniorhigh';
$route['exportclasslistJuniorhigh/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'Principal_controller/exportClasslistJuniorhigh/$1/$2/$3/$4/$5';









// PRINCIPAL GRADESCHOOL
$route['evaluate_gradeschool'] = 'Principal_controller/evaluateGradeschool';
$route['advice_gradeschool/(:any)'] = 'Principal_controller/adviceGradeschool/$1';
$route['viewcurriculumGradeschool'] = 'Principal_controller/viewGradeschoolCurriculum';
$route['addsubjectTempGradeschool'] = 'Principal_controller/addsubjectTempGradeschool';
$route['removeTempSubjectGradeschool/(:any)'] = 'Principal_controller/removeTempSubjectGradeschool/$1';
$route['savestudentGradeschool'] = 'Principal_controller/saveStudentGradeschool';
$route['gradeschoolStudentinfo'] = 'Principal_controller/gradeschoolStudentinfo';
$route['reevaluatestudentGradeschool/(:any)'] = 'Principal_controller/reevaluatestudentGradeschool/$1';
$route['schedule_gradeschool'] = 'Principal_controller/scheduleGradeschool';
$route['editScheduleGradeschool/(:any)'] = 'Principal_controller/editScheduleGradeschool/$1';
$route['updateScheduleGradeschool/(:any)'] = 'Principal_controller/updateScheduleGradeschool/$1';
//CLASSLIST
$route['classlistgradeschool'] = 'Principal_controller/classlistGradeschool';
$route['exportclasslistGradeschool/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'Principal_controller/exportClasslistGradeschool/$1/$2/$3/$4/$5';













//REGISTRAR COLLEGE
$route['registrardashboard'] = 'Registrar_controller/registrarDashboard';
$route['college'] = 'Registrar_controller/college';
$route['assescollege/(:any)'] = 'Registrar_controller/assescollege/$1';
$route['shiftstudent/(:any)'] = 'Registrar_controller/shiftStudentCollege/$1';
$route['marktes/(:any)'] = 'Registrar_controller/marktesCollege/$1';
$route['updateCollegeinfo/(:any)'] = 'Registrar_controller/updateCollegeinfo/$1';
$route['college_dropsubject/(:any)'] = 'Registrar_controller/getstudentInfoCollege/$1';
$route['dropsubject/(:any)'] = 'Registrar_controller/dropsubjectCollege/$1';
$route['collegeranking'] = 'Registrar_controller/collegRanking';
$route['addCdiscount/(:any)'] = 'Registrar_controller/addCDiscount/$1';
$route['removeCdiscount/(:any)/(:any)'] = 'Registrar_controller/removeCDiscount/$1/$2';

//REGISTRAR SENIOR HIGH
$route['seniorhigh'] = 'Registrar_controller/seniorhigh';
$route['updateSeniorhighinfo/(:any)'] = 'Registrar_controller/updateSeniorhighinfo/$1';
$route['assesSeniorhigh/(:any)'] = 'Registrar_controller/assesSeniorhigh/$1';
$route['shiftstudentSeniorhigh/(:any)'] = 'Registrar_controller/shiftStudentSeniorhigh/$1';
//REGISTRAR JUNIOR HIGH
$route['juniorhigh'] = 'Registrar_controller/juniorhigh';
$route['shiftstudentJuniorhigh/(:any)'] = 'Registrar_controller/shiftstudentJuniorhigh/$1';
$route['updateJuniorhighinfo/(:any)'] = 'Registrar_controller/updateJuniorhigh/$1';
$route['assesJuniorhigh/(:any)'] = 'Registrar_controller/assesJuniorhigh/$1';
//REGISTRAR GRADE SCHOOL
$route['gradeschool'] = 'Registrar_controller/gradeschool';
$route['assesGradeschool/(:any)'] = 'Registrar_controller/assesGradeschool/$1';
$route['shiftstudentGradeschool/(:any)'] = 'Registrar_controller/shiftstudentGradeschool/$1';
$route['updateGradeschoolinfo/(:any)'] = 'Registrar_controller/updateGradeschool/$1';
$route['seniorhigh_dropsubject/(:any)'] = 'Registrar_controller/getstudentInfoSeniorhigh/$1';
$route['dropsubject_seniorhigh/(:any)'] = 'Registrar_controller/dropsubjectSeniorhigh/$1';







//CASHIER COLLEGE
$route['cashier_college'] = 'Cashier_controller/cashierCollege';
$route['markEnrolledCollege/(:any)'] = 'Cashier_controller/enrollCollege/$1';
$route['creport_college'] = 'Cashier_controller/exportCollege';

//CASHIER SENIOR HIGH
$route['cashier_seniorhigh'] = 'Cashier_controller/cashierSeniorhigh';
$route['markEnrolledSeniorhigh/(:any)'] = 'Cashier_controller/enrollSeniorhigh/$1';
//CASHIER JUNIOR HIGH
$route['cashier_juniorhigh'] = 'Cashier_controller/cashierJuniorhigh';
$route['markEnrolledJuniorhigh/(:any)'] = 'Cashier_controller/enrollJuniorhigh/$1';
//CASHIER GRADESCHOOL
$route['cashier_gradeschool'] = 'Cashier_controller/cashierGradeschool';
$route['markEnrolledGradeschool/(:any)'] = 'Cashier_controller/enrollGradeschool/$1';









//TEACHER 
$route['myclasscollege'] = 'Teacher_controller/mySubjectCollege';
$route['collegeclasslist/(:any)/(:any)/(:any)/(:any)'] = 'Teacher_controller/collegeClassList/$1/$2/$3/$4';
$route['updateGradeCollege/(:any)'] = 'Teacher_controller/updateGradeCollege/$1';
$route['teacherexportclasslistcollege/(:any)/(:any)/(:any)/(:any)'] = 'Teacher_controller/teacherexportclasslistcollege/$1/$2/$3/$4';

$route['myclassseniorhigh'] = 'Teacher_controller/mySubjectSeniorhigh';
$route['seniorhighclasslist/(:any)/(:any)'] = 'Teacher_controller/seniorhighClassList/$1/$2';
$route['updateGradeSeniorhigh/(:any)'] = 'Teacher_controller/updateGradeSeniorhigh/$1';

$route['myclassjuniorhigh'] = 'Teacher_controller/mySubjectJuniorhigh';
$route['juniorhighclasslist/(:any)/(:any)'] = 'Teacher_controller/juniorhighClassList/$1/$2';
$route['updateGradeJuniorhigh/(:any)'] = 'Teacher_controller/updateGradeJuniorhigh/$1';

$route['myclassgradeschool'] = 'Teacher_controller/mySubjectGradeschool';
$route['gradeschoolclasslist/(:any)/(:any)'] = 'Teacher_controller/gradeschoolClassList/$1/$2';
$route['updateGradeGradeschool/(:any)/(:any)'] = 'Teacher_controller/updateGradeGradeschool/$1/$2';


//CLINIC
$route['tracevisitors'] = 'Clinic_controller/visitors';
$route['exportvisitors'] = 'Clinic_controller/exportVisitors';





//REPORTS ENROLLMENT SYSTEM
$route['studentSubjectsCollege/(:any)'] = 'Reports_controller/studentsSubjectsCollege/$1';
$route['assessstudentCollege/(:any)'] = 'Reports_controller/studentsAssessment/$1';
$route['exportlistCollegePcourse'] = 'Reports_controller/exportlistCollegePcourse/$1';
$route['printgradeCollege/(:any)'] = 'Reports_controller/printGradeCollege/$1';


$route['studentSubjectSeniorhigh/(:any)'] = 'Reports_controller/studentSubjectSeniorhigh/$1';
$route['assesstudentSeniorhigh/(:any)'] = 'Reports_controller/studentsAssessmentSeniorhigh/$1';
$route['printgradeSeniorhigh/(:any)'] = 'Reports_controller/printGradeSeniorhigh/$1';


$route['studentSubjectJuniorhigh/(:any)'] = 'Reports_controller/studentSubjectJuniorhigh/$1';
$route['assesstudentJuniorhigh/(:any)'] = 'Reports_controller/studentsAssessmentJuniorhigh/$1';
$route['printgradeJuniorhigh/(:any)'] = 'Reports_controller/printGradeJuniorhigh/$1';


$route['studentSubjectGradeschool/(:any)'] = 'Reports_controller/studentSubjectGradeschool/$1';
$route['assesstudentGradeschool/(:any)'] = 'Reports_controller/studentsAssessmentGradeschool/$1';
$route['printgradeGradeschool/(:any)'] = 'Reports_controller/printGradeGradeschool/$1';



$route['printcollegeinfo/(:any)'] = 'Reports_controller/printCollegeInfo/$1';
$route['printseniorhighinfo/(:any)'] = 'Reports_controller/printSeniorhighInfo/$1';
$route['printjuniorhighinfo/(:any)'] = 'Reports_controller/printJuniorhighInfo/$1';
$route['printgradeschoolinfo/(:any)'] = 'Reports_controller/printGradeschoolInfo/$1';




//HUMAN RESROUCE
$route['employees'] = 'Humanresource_controller/employees';
$route['addemployee'] = 'Humanresource_controller/addEmployee';
$route['updateemployee/(:any)'] = 'Humanresource_controller/updateEmployee/$1';
$route['deletemployee/(:any)'] = 'Humanresource_controller/deleteEmployee/$1';
$route['empattendance'] = 'Humanresource_controller/viewAttendance';
$route['exportattendance'] = 'Humanresource_controller/exportAttendance';



//POD College
$route['pod_college'] = 'POD_controller/collegestudents';
$route['infostudentcollege/(:any)'] = 'POD_controller/ViewstudentsinfoCollege/$1';
$route['addoffense/(:any)'] = 'POD_controller/addOffense/$1';
$route['caseclosed/(:any)/(:any)'] = 'POD_controller/caseClosed/$1/$2';
$route['uploadpdf/(:any)/(:any)'] = 'POD_controller/uploadPDF/$1/$2';
$route['deleteoffense/(:any)/(:any)'] = 'POD_controller/deleteOffense/$1/$2';

//POD SHS
$route['pod_seniorhigh'] = 'POD_controller/seniorhighstudents';
$route['infostudentseniorhigh/(:any)'] = 'POD_controller/ViewstudentsinfoSeniorhigh/$1';
$route['addoffenseshs/(:any)'] = 'POD_controller/addOffenseshs/$1';
$route['caseclosedshs/(:any)/(:any)'] = 'POD_controller/caseClosedshs/$1/$2';
$route['uploadpdfshs/(:any)/(:any)'] = 'POD_controller/uploadPDFshs/$1/$2';
$route['deleteoffenseshs/(:any)/(:any)'] = 'POD_controller/deleteoffenseshs/$1/$2';

//POD JHS
$route['pod_juniorhigh'] = 'POD_controller/juniorhighstudents';
$route['infostudentjuniorhigh/(:any)'] = 'POD_controller/Viewstudentsinfojuniorhigh/$1';
$route['addoffensejhs/(:any)'] = 'POD_controller/addOffensejhs/$1';
$route['caseclosedjhs/(:any)/(:any)'] = 'POD_controller/caseClosedjhs/$1/$2';
$route['uploadpdfjhs/(:any)/(:any)'] = 'POD_controller/uploadPDFjhs/$1/$2';
$route['deleteoffensejhs/(:any)/(:any)'] = 'POD_controller/deleteoffensejhs/$1/$2';


//POD GS
$route['pod_gradeschool'] = 'POD_controller/gradeschoolstudents';
$route['infostudentgradeschool/(:any)'] = 'POD_controller/ViewstudentsinfoGradeschool/$1';
$route['addoffensegs/(:any)'] = 'POD_controller/addOffensegs/$1';
$route['caseclosedgs/(:any)/(:any)'] = 'POD_controller/caseClosedgs/$1/$2';
$route['uploadpdfgs/(:any)/(:any)'] = 'POD_controller/uploadPDFgs/$1/$2';
$route['deleteoffensegs/(:any)/(:any)'] = 'POD_controller/deleteoffensegs/$1/$2';

//PRESIDENT
// $route['meetings'] = 'Meeting_controller/Meeting';
// $route['addmeeting'] = 'Meeting_controller/addMeeting';
// $route['updatemeeting/(:any)'] = 'Meeting_controller/updateMeeting/$1';
// $route['deletemeeting/(:any)'] = 'Meeting_controller/deleteMeeting/$1';

// CANTEEN
// $route['menu'] = 'Canteen_controller/menuManagement';
// $route['addmenu'] = 'Canteen_controller/addMenu';
// $route['updatemenu/(:any)'] = 'Canteen_controller/updateMenu/$1';
// $route['deletemenu/(:any)'] = 'Canteen_controller/deleteMenu/$1';

// $route['product'] = 'Canteen_controller/productManagement';
// $route['addproduct'] = 'Canteen_controller/addProduct';
// $route['updateproduct/(:any)'] = 'Canteen_controller/updateProduct/$1';
// $route['deleteproduct/(:any)'] = 'Canteen_controller/deleteProduct/$1';
// $route['addstock/(:any)'] = 'Canteen_controller/addStock/$1';



//CUSTODIAN
// $route['inventory'] = 'Custodian_controller/inventoryMangement';
// $route['addinventory'] = 'Custodian_controller/addInventory';
// $route['updateinventory/(:any)'] = 'Custodian_controller/updateInventory/$1';
// $route['deleteinventory/(:any)'] = 'Custodian_controller/deleteInventory/$1';

// $route['deployment'] = 'Custodian_controller/deploymentManagement';
// $route['additemtemp'] = 'Custodian_controller/addItemTemp';
// $route['removeitemtemp/(:any)'] = 'Custodian_controller/removeItemTemp/$1';
// $route['adddeployment'] = 'Custodian_controller/addDeployment';
// $route['removedeployment/(:any)'] = 'Custodian_controller/removeDeployment/$1';
// $route['updatedeployment/(:any)'] = 'Custodian_controller/updateDeployment/$1';
// $route['returnitem/(:any)/(:any)'] = 'Custodian_controller/returnItem/$1/$1';

// REPORTS
$route['exportclasslist/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'Deans_controller/exportClasslistCollege/$1/$2/$3/$4/$5/$6';

//ALUMNI
$route['alumni'] = 'Alumni_controller/alumni';
$route['updatealumni/(:any)'] = 'Alumni_controller/updateAlumni/$1';
$route['validatealumni/(:any)'] = 'Alumni_controller/validateAlumni/$1';
$route['deletealumni/(:any)'] = 'Alumni_controller/deleteAlumni/$1';


// MULTIMEDIA
$route['request'] = 'Multimedia_controller/requestAlumniID';
$route['markforpickup/(:any)'] = 'Multimedia_controller/markforPickup/$1';
$route['markdone/(:any)'] = 'Multimedia_controller/markDone/$1';
$route['deleterequest/(:any)'] = 'Multimedia_controller/deleteRequest/$1';

//DISCOUNT
$route['discount'] = 'Discount_Controller/Discount';
$route['addDiscount'] = 'Discount_Controller/addDiscount';
$route['updatediscount/(:any)'] = 'Discount_Controller/updateDiscount/$1';
$route['deletediscount/(:any)'] = 'Discount_Controller/deleteDiscount/$1';


// MIS
$route['mistransactionlogs'] = 'MIS_controller/transactionLogs';
$route['mistransactionforms'] = 'MIS_controller/transactionForms';
$route['insertrequest'] = 'MIS_controller/insertRequest';

//COLLEGE RESET
$route['collegereset'] = 'MIS_controller/collegestudents';
$route['resetcollegse/(:any)'] = 'MIS_controller/resetCollege/$1';
//SENIORHIGH RESET
$route['shsreset'] = 'MIS_controller/shsstudents';
$route['resetseniorhigh/(:any)'] = 'MIS_controller/resetSeniorhigh/$1';

//SENIORHIGH RESET
$route['jhsreset'] = 'MIS_controller/jhsstudents';
$route['resetjuniorhigh/(:any)'] = 'MIS_controller/resetJuniorhigh/$1';



//SYSTEM CONFIG
$route['systemconfiguration'] = 'Systemconfig_controller/SystemConfig';




//LOG OUT
$route['logout'] = 'Logout_controller/logout';


//MY ROUTE ON LOGIN
$route['default_controller'] = 'Login_controller/login';
$route['authenticate'] = 'Login_controller/authenticate';
$route['loginUser'] = 'Login_controller/authenticate2';
//$route['loginUser/(:any)/(:any)'] = 'Login_controller/authenticate2/$1/$2';


//DASHBOARD
$route['dashboard'] = 'Dashboard_controller/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
