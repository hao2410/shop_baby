<?php
    require 'inc/header.php';
?>
    <div class="container">
        <div>
            <h2 id="question">Frequently asked questions: </h2>
            <div class="question">
                <a href="#answer1">[Error] Why is my account locked/limited?</a>
            </div>
            <div class="question">
                <a href="#answer2">[Baby care account] Why didn't I receive the OTP Verification Code?</a>
            </div>
            <div class="question">
                <a href="#answer3">[Scam alert] Shop safely with baby care</a>
            </div>
            <div class="question">
                <a href="#answer4">[Scam Warning] Do's and Don'ts to avoid receiving fake/fake orders</a>
            </div>
        </div>
        <h2 id="answer1">1- [Error] Why is my Baby care account locked/restricted?</h2>
        <p>Your account may be locked/restricted for one of the following reasons:</p><br>
        <div>
        <table>
            <tr>
                <th>Object</th>
                <th>Reason</th>
                <th>Proper handling direction</th>
            </tr>
            <tr>
                <td>All users</td>
                <td>
                    <p>Error (L01): because the system detects that you have logged into multiple accounts using the
                        same device</p>
                    <p>Your account shows signs of violating Baby care's Terms of Service (common Error F02)</p>
                    <p>Username/Shop name:</p>
                    <p>- Same as Baby care's official account (eg: Baby carevn, Baby carevietna, ...)</p>
                    <p>- Same or similar to other e-commerce websites such as Zimbaby, Sendo, Tiki...</p>
                    <p>- Contains a link to a website with a business model similar to Baby care</p>

                </td>
                <td>Please use another device to login or try again in the next 10 days</td>
            </tr>
            <tr>
                <td>Buyer</td>
                <td>
                    <p>Create virtual orders, virtual reviews</p>
                    <p>Abuse of discount codes, discount programs or promotions at Baby care</p>
                    <p>There are fraudulent and deceptive acts that negatively affect Users/ Baby care Policy</p>
                </td>
                <td>Your account has been locked, contact admin for support</td>
            </tr>
            <tr>
                <td>Seller</td>
                <td>
                    <p>Using vulgar language and images in the sales process as well as when communicating on Baby care
                    </p>
                    <p>Use different accounts to sell the same product</p>
                    <p>Post the same product multiple times in different categorie</p>
                    <p>Post multiple products but there is no discernible difference in the details of each product
                        (image, name, description, price, classification, ...)</p>
                </td>
                <td>
                    <p>Have information/documents ready for Baby care to handle:</p>
                    <p>- Business license (if any)</p>
                    <p>- Minutes of product origin certification</p>
                    <p>- Business model declaration</p>
                </td>
            </tr>
        </table>
        </div>
        <div id="answer2">
            <h2>2- [Baby care Account] Why didn't I receive the OTP Verification Code?</h2>
            <p>If you do not receive the OTP verification code when you log in or change your account password/PIN of Baby
                care account balance via Zalo message/SMS/Auto call, the cause may be due to:</p>
            <p><b>1. Connection or transmission error</b></p>
            <p>In this case, you can try the following workarounds:</p>
            <p>- Check the network connection (for Zalo messages) and telecommunications service waves (for SMS messages,
                Automatic calls) on your phone to make sure it is strong enough.</p>
            <p>- Request to resend OTP verification code (allow up to 04 times)</p>
            <p><b>2. Incorrect account link phone number</b></p>
            <p>The correct phone number to receive the verification code must be the phone number you used to register your
                Baby care account. Please double check this information in the My Account section to make sure your Baby
                care
                account and the phone number associated with your Baby care account are correct.</p>
            <p>In case the phone number associated with the previous Baby care account you used is changed according to the
                carrier's regulations, please update the correct number to receive the OTP verification code.</p>
            <p><b>3. OTP Code sending request limit exceeded</b></p>
            <p>The message OTP Request Failed (D06) will be displayed when you have exceeded the allowed number of requests
                to send OTP Verification Code (maximum 04 times). This limit is put in place to limit the risk of your
                account being stolen</p>
            <p>In this case, please wait 30 minutes and try to request to resend the OTP</p>
            <p><b>4. Other causes</b></p>
            <p>Your Baby care account must not be logged in for more than 180 days</p>
        </div>
        <div id="answer3">
            <h2>3- [Scam alert] Shop safely with baby care</h2>
            <p><b>1. download apps from authorized app stores</b></p>
            <p>Only download on app (for ios), google play (for android operating system)...</p>
            <p><b>2. only make transactions on the main website</b></p>
            <p>Only do it on the main page and beware of requests made off the website, the shop does not take any responsibility in the above case.</p>
            <p><b>3. beware of suspicious messages</b></p>
            <p>Only receive information from main media sites (email, fb.. )</p>
            <p><b>4. never share OTP authentication codes</b></p>
            <p>Web never asks you to provide account verification code or password via phone message, sms...</p>
        
        </div>
        <div id="answer4">
            <h2>4- [Scam Warning] Do's and Don'ts to avoid receiving fake/fake orders</h2>
            <p><b>1. What should and shouldn't do when receiving Shopee goods?</b></p>
            <p>To ensure safety when shopping, Shopee notes you some of the following points:</p>
            <p><b>Should: </b></p>
            <p>- check the information carefully</p>
            <p>- limited acceptance</p>
            <p>- refuse to receive the goods if the authenticity is doubted</p>
            <p>- Priority is to choose the payment method first</p>
            <p><b>Should not: </b></p>
            <p>- pay without carefully checking the order</p>
            <p>- payment when in doubt (check order status)</p>
            <p>- share personal information</p>
            <p>- create a private transaction with the seller</p>
        </div>
    </div>

<style>
    #answer2{
            margin-top: 20px;
        }
    p{
        margin-top: 10px;
    }
    .h2{
        margin: 20px 0px 20px 0px;
    }
</style>
<?php
    require 'inc/footer.php';
?> 