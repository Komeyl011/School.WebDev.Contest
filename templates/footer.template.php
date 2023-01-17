<footer>
    <!-- FOOTER HEADING -->
    <div class="heading">
        <p>Let's get started</p>
        <div class="line"></div>
    </div>
    <!-- FOOTER SEND INFO FORM -->
    <form action="includes/send-info.inc.php" method="post">

        <!-- Data Inputs -->
        <!-- <div class="labels">
            <label for="name">Name</label>
            <label for="mail">Email</label>
            <label for="number">Phone Number (optional)</label>
        </div>
        <div class="inputs">
            <input type="text" name="name">
            <input type="email" name="mail">
            <input type="text" name="number">
        </div> -->
        <div class="inputs_wrapper">
            <div class="input">
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="input">
                <label for="mail">Email</label>
                <input type="email" id="mail" name="mail">
            </div>
            <div class="input">
                <label for="number">Phone Number (optional)</label>
                <input type="text" id="number" name="number">
            </div>
        </div>
        <!-- Checkbox -->
        <div class="checkbox">
            <input type="checkbox" id="call" name="call">
            <label for="call">Please call me to make an appointment</label>
        </div>
        <!-- Submit button -->
        <button type="submit" name="submit">send</button>
    </form>
    <div class="footer_copyright">
        <!-- LINE -->
        <div class="container"></div>
        <!-- COPYRIGHT TEXT -->
        <p>All rights reserved 2022.</p>
        <!-- <a href="#"><i class="fa-brands fa-telegram"></i></a> -->
    </div>
</footer>

</body>
</html>