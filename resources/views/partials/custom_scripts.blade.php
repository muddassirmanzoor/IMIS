<script>
        $(document).ready(function() {
        $('#district-select').on('change', function() {
            $('#customType').val('district');
            $('#tehsils-select').val('');
            $('#marakez-select').val('');
            $('#emis-code-select').val('');
            $("#School-type-select").prop("disabled", false);
            $('#filterForm').submit(); // Trigger form submission
        });
        $('#tehsils-select').on('change', function() {
            $('#customType').val('tehsil');
            $('#marakez-select').val('');
            $('#emis-code-select').val('');
            $("#School-type-select").prop("disabled", false);
            $('#filterForm').submit(); // Trigger form submission
        });
        $('#marakez-select').on('change', function() {
            $('#customType').val('markaz');
            $('#emis-code-select').val('');
            $("#School-type-select").prop("disabled", false);
            $('#filterForm').submit(); // Trigger form submission
        });
        $('#emis-code-select').on('change', function() {
            $('#customType').val('emis_code');
            $('#filterForm').submit(); // Trigger form submission
        });
        $('#School-type-select').on('change', function() {
            $('#district-select').val('');
            $('#tehsils-select').val('');
            $('#marakez-select').val('');
            $('#emis-code-select').val('');
            $('#filterForm').submit(); // Trigger form submission
        });
    });
        function submitSchoolsForm(level) {
            $('#schoolLevel').val(level);
            $('#schoolsForm').submit(); // Trigger form submission
        }
        function submitTeachersForm(level) {
            $('#teacherLevel').val(level);
            $('#teachersForm').submit(); // Trigger form submission
        }
        function submitStudentsForm(level) {
            $('#studentLevel').val(level);
            $('#studentsForm').submit(); // Trigger form submission
        }
        //FLN
        function submitFLNCampsForm() {
            $('#FLNCampsForm').submit(); // Trigger form submission
        }
        function FLNDistrictWiseEnrollmentForm() {
            $('#FLNDistrictWiseEnrollmentForm').submit(); // Trigger form submission
        }
        function FLNAttendanceForm() {
            $('#FLNAttendanceForm').submit(); // Trigger form submission
        }
        function FLNComplaintsForm() {
            $('#FLNComplaintsForm').submit(); // Trigger form submission
        }
        function FLNOOSCEnrollmentForm() {
            $('#FLNOOSCEnrollmentForm').submit(); // Trigger form submission
        }
        $(document).ready(function() {
        $('#district-select2').on('change', function() {
            $('#tehsils-select2').val('');
            $('#filterForm2').submit(); // Trigger form submission
        });
        $('#tehsils-select2').on('change', function() {
            $('#filterForm2').submit(); // Trigger form submission
        });
    });

</script>
