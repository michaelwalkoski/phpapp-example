# A Beginner's Guide to Developing PHP Applications with Distelli
In this tutorial, we're going to learn how to build, test, and deploy a PHP application using Distelli. PHP is one of many languages available, but it’s simplicity and flexibility make it a great place to begin. Many of the concepts you learn in in this tutorial will transfer to other languages and you’ll learn about setting up a website. Distelli also supports Java, Node.js, Phython, and Ruby.

The foundation of web development is the client-server relationship. You are the client when you enter a web address in your browser. The request is sent to the server and a file is returned to your browser to be displayed. The process is similar to opening a file on your computer, but in this case, it’s returned through the browser.

The difference between PHP and other languages like JavaScript is where they are executed. PHP applications are run on the server before being sent to your browser, while JavaScript is run on your computer. We call these server-side and client-side languages. Web programs can use both client and server languages, and with databases and other technologies, you can create powerful applications. But don’t worry, we’ll start with a simple calculator application and turn it into an app to calculate the cost of a cookie order.

### Step 1. Create a Free Account on Distelli

In your web browser navigate to <a href="https://www.distelli.com/signup" target="_blank">https://www.distelli.com/signup</a> and sign-up for your free Distelli account.

![alt text](http://www.michaelwalkoski.com/distellitutorial/1.jpg)

### Step 2. Create a Free Account on Amazon Web Services (AWS) to Start a Server

In your web browser navigate to <a href="https://aws.amazon.com/" target="_blank">https://aws.amazon.com/</a> and sign-up for your free AWS account. Then complete the following steps.

<a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html#create-an-iam-user" target="_blank">Create an IAM User</a>.

<a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html#create-a-key-pair" target="_blank">Create a Key Pair</a>.

<a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html#create-a-vpc" target="_blank">Create a Virtual Private Cloud (VPC)</a>.

<a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html#create-a-base-security-group" target="_blank">Create a Security Group</a>.

Distelli deploys your application from GitHub to your public Amazon EC2 server and allows you to track changes.

### Step 3. Add a Server

In this step we will create our virtual server, or known from now on as an instance.

In Distelli, click the **Servers** link at the top of the WebUI. Then click the green **New Server** button on the top right.

![alt text](http://www.michaelwalkoski.com/distellitutorial/2.jpg)

Click **Launch an EC2 Instance**.

Enter your EC2 Credentials from when you created your AWS username and click **Update Credentials**.

Click **New EC2 Configuration**.

Select the AWS Region that you used to create your credentials.

In Select Instance type, choose the **Memory Optimized** Tab, and then click **t2.micro**. This option is free for the first year.

Click **Ubuntu** under Select OS Image.

Select the default VPC server under Configure Virtual Private Cloud.

Select the first option under Configure Subnet.

Select the key pair you created for your username earlier.

Choose the Default security group.

Click **launch**!

### Step 4. Make the Server Publicly Accessible

Sign in to <a href="https://aws.amazon.com/" target="_blank">AWS</a>, click **EC2** near the top left.

Select **Security Groups** under Network & Security in the left pane.

There will be four tabs near the bottom. Select **inbound**.

Click the **Edit** button then **Add Rule**.

Under the Type dropdown box, choose **HTTP**.

Under Source, click **anywhere**.

**Save**!

### Step 4. Create a Permanent Address for Your Website

Select **Elastic IPs** underneath Security Groups in the left pane.

Click the **Allocate Address** button near the top left.

Then click the Actions dropdown to its right and select **Associate Address**.

In the popup, select Search Instance ID or Name Tag text box and click the running instance.

Click **Associate Instance**.

The elastic IP address you just associated will be your permanent public address.

### Step 5. Install an SSH Client on Your Computer

Think of this application like you would the file manager on your computer. You will be able to edit, delete, or rename files, and in our next step install the Distelli Agent. However, a SSH client relies on the command line interface, or text, to execute changes.

**Windows**: <a href="http://www.chiark.greenend.org.uk/~sgtatham/putty/" target="_blank">Install PuTTy</a>.

<a href="https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/putty.html?console_help=true" target="_blank">Connecting to Your Linux Instance from Windows Using PuTTY</a>

**Mac**: Open Terminal from Applications > Utilities > Terminal.app

Open Terminal. From the prompt, you’ll enter the command,
```
ssh -i "folder-of-key-pair/your-key-pair-name.pem" ubuntu@your-elastic-ip-address
```

Here is mine as an example

```
ssh -i "/Users/Home/Downloads/michaelwalkoski-key-pair.pem" ubuntu@52.8.156.211
```

### Step 6. Install Distelli Agent

The wget command downloads the file and agent install installs it on on the server.
```
wget -qO- https://www.distelli.com/download/client | sh
```
When the process has completed, enter the following command.
```
sudo /usr/local/bin/distelli agent install
```

You will be prompted for your Distelli email and password. Once you submit, your EC2 instance will be setup for use with Distelli.

### Step 7.	Create a Free GitHub Account

Navigate to <a href="https://github.com/" target="_blank">https://github.com/</a> and sign up for your free GitHub account.

### Step 8. Get the Deployment Instructions

The Distelli deployment instructions are in a distelli-manifest.yml file.  This file and an nginx configuration file are available in a distelli public GitHub repository here.
```
https://github.com/distelli/phpapp-example
```

Fork this repository to your GitHub account.

### Step 9. Create the Application in Distelli

In Distelli click the **Applications** link at the top of the WebUI. Then click the **New App** button on the top right.

Give your application a name. Use the name **PHPApp**. This name has no bearing on your PHP application.

> The application name must match the application name in the distelli-manifest.yml file.

After entering a name, click the **Use GitHub** button.

> If the button instead says **Connect GitHub** click that and connect your GitHub account.

Select the repository you forked from [Step 8](#step-8-get-the-deployment-instructions) above.

Choose the **master** branch.

Two environment will be automatically created for you. Click the **All Done** button to continue.

At this point you will pause the *new application workflow* and edit the deployment instructions before continuing.

### Step 10. Edit the distelli-manifest.yml Instructions

You already have a distelli-manifest.yml file provided in the repository you forked earlier. You must edit this file and commit the edit to your repository.

Edit the distelli-manifest.yml file. Change <SET_ME_DISTELLI_USERNAME> to your Distelli username.
```
<SET_ME_DISTELLI_USERNAME>/phpapp:
```
For example.
```
johndoe/phpapp:
```
### Step 11. Build the Application

Go back to the Distelli WebUI and click the **I've pushed my Repo** button.

Click the **Looks good. Start Build!** button.

The build that is kicked off will validate that you have the correct Distelli user name and your application name matches. After a successful build, a software release will be created. For more information on builds see [Viewing Builds](doc:viewing-builds).

If you are not on the builds list page, click the **Builds** button at the top of the Distelli WebUI.

Your successful build will be at the top of the list. 

Click the **New Deployment** button at the top right to begin a deployment

### Step 12. Deploy the Application

In the new deployment wokflow step 1, click **Deploy a Release**.

Select the application you wish to deploy. 

Select the release you wish to deploy. You should only have the one release created from the successful build.

Select the **-prod** environment. If you have been following along with the same application name (PHPApp) the environment will be named **PHPApp-prod**, select that.

Select the AWS EC2 instance that we setup earlier and click **add server**.

### Step 13. View your PHPApp online

Navigate to http://your-elastic-ip/phpapp.php

You will now see a simple multiplication calculator. Try different numbers to see how the app behaves.

### Step 14. How Does phpapp.php Work?

Open the phpapp.php file in your repository. We'll go over each line.

These are called opening and closing tags. When the server is parsing the file, it will interpret the PHP code between them.

```
<?php ?>
```
This is a basic if than statement. If there is content in the textbox named value1, then the variable $value1 will take on its value. It's called a variable because its value depends on the content of the text box and will change if you enter a different integer. The following line with value2 is creating an additional variable since we are multiplying two numbers.
```
if (isset($_POST['value1'])) $value1 = $_POST['value1'];
```
Here we create a third variable, the answer. It is executing our intended multiplication.
```
$answer = $value1 * $value2;
```
The echo command on line 6 will print the following text. A very basic PHP script is <?php echo 'Hello World!; ?>. This will return Hello World! if executed on a server.

The form method post returns the data that users enter in the subsequent text boxes and returns it when they click the submit buttom.
```
<strong></strong> bolds text.
<br/> creates a line break.
<input type='text' name='value1' value="$value1"/> creates a text box for users to enter information.
<input type='submit' value='Calculate'/> creates a submit button.
```
The last three lines return the data from the submitted forum. Do you notice variable $answer is being printed using the echo command?
```
<br/>
The answer is:<input type="text" value="<?php echo round($answer)?>">
</form>
```
### Step 15. Modify the App to Total a Cookie Order

Copy and paste the following text into the phpapp.php file in your repository. Comments above each change will explain how they affected the app. We will then deploy the updated app.
```
<?php
# Comments behind a hashtag are not parsed by the server.
# They are handy for other people working with your code
# or later when when you forget what you intended.

# Here we are creating a variable to determine price of cookies.
$chocolatechipprice = 3;
$macadamianutprice = 4;

# Cookie quantities are being determined by user input.
if (isset($_POST['chocolatechipqty'])) $chocolatechipqty = $_POST['chocolatechipqty'];
if (isset($_POST['macadamianutqty'])) $macadamianutqty = $_POST['macadamianutqty'];

# We are totaling the cookie's price by type.
$chocolatechiptotal = $chocolatechipprice * $chocolatechipqty;
$macadamianuttotal = $macadamianutprice * $macadamianutqty;

# The total price is the total of chocolate chip cookies
# plus the total price of macadamia nut cookies.
$total = $chocolatechiptotal + $macadamianuttotal;

# The name and value of the text boxes has been changed to
# coordinate with the above variables.
echo <<<_END
<form method='post' action='phpapp.php'>
<strong>Calculate Your Cookie Order</strong><br/><br/>
Chocolate Chip Cookies ($3 each):&nbsp;<input type='text' name='chocolatechipqty' value="$chocolatechipqty"/><br/>
Macadamia Nut Cookies ($4 each):&nbsp;<input type='text' name='macadamianutqty' value="$macadamianutqty"/><br/><br/>
<input type='submit' value='Calculate'/>
_END;
?>

<br/><br/>
Your total is:&nbsp;$<input type="text" value="<?php echo round($total)?>">
</form>
```
Once you have clicked on **Commit Change** at the bottom of the updated phpapp.php file in your repository. Return to the Distelli WebUI.

Scroll down to your deployed apps. You will find ⊕PHPApp listed.

Click **⊕** then the green button with the rocket icon inside to **Deploy Latest Release**.

When the menu appears for a New Deployment, select **Deploy**.

You will see the progress of the update. When the deployment is 100%, you can return to http://your-elastic-ip/phpapp.php to see the updated app.
