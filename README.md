# An Beginner's Guide to Developing PHP Applications with Distelli
In this tutorial, we are going to learn how to build, test, and deploy a PHP application using Distelli. PHP is one of many languages available, but it’s simplicity and flexibility make it a great place to begin. Many of the concepts you learn in in this tutorial will transfer to other languages and you’ll learn about setting up a website. Distelli also supports Java, Node.js, Phython, and Ruby.

The foundation of web development is the client-server relationship. You are the client when you enter a web address in your browser. The request is sent to the server and a file is returned to your browser to be displayed. The process is similar to opening a file on your computer, but in this case, it’s returned through the browser.

The difference between PHP and other languages like JavaScript is where they are executed. PHP applications are run on the server before being sent to your browser, while JavaScript is run on your computer. We call these server-side and client-side languages. Web programs can use both client and server languages, and with databases and other technologies, you can create powerful applications. But don’t worry, we’ll start with a simple calculator application and turn it into an app to calculate the cost of a cookie order.

### Step 1. Create a Free Account on Distelli

In your web browser navigate to <a href="https://www.distelli.com/signup" target="_blank">https://www.distelli.com/signup</a> and sign-up for your free Distelli account.
<br>

### Step 2. Create a free Amazon Web Services (AWS) account to start your own server.

In your web browser navigate to <a href="https://aws.amazon.com/" target="_blank">https://aws.amazon.com/</a> and sign-up for your free AWS account. Then complete the following steps.

<a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html#create-an-iam-user" target="_blank">Create an IAM User</a>.

<a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html#create-a-key-pair" target="_blank">Create a Key Pair</a>.

<a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html#create-a-vpc" target="_blank">Create a Virtual Private Cloud (VPC)</a>.

<a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html#create-a-base-security-group" target="_blank">Create a Security Group</a>.

Distelli deploys your application from GitHub to your public Amazon EC2 server and allows you to track changes.

### Step 3. Add a Server

In Distelli, click the **Servers** link at the top of the WebUI. Then click the **New Server** button on the top right.

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

Click launch!

### Step 4. Make the Server Publicly Accessible

Sign in to <a href="https://aws.amazon.com/" target="_blank">AWS</a>, click EC2 near the top left.

Select Security Groups under Network & Security in the left pane.

There will be four tabs near the bottom. Select inbound.

Click the Edit button then Add Rule.

Under the Type dropdown box, choose HTTP.

Under Source, click anywhere.

Save!

