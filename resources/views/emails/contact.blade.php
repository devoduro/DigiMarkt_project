<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(to right, #10B981, #4F46E5);
            color: white;
            padding: 20px;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 0 0 5px 5px;
            border: 1px solid #eee;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .value {
            background-color: white;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DigiMarkt Contact Form Submission</h1>
    </div>
    
    <div class="content">
        <p>A new contact form submission has been received from the DigiMarkt website.</p>
        
        <div class="field">
            <div class="label">Name:</div>
            <div class="value">{{ $data['name'] }}</div>
        </div>
        
        <div class="field">
            <div class="label">Email:</div>
            <div class="value">{{ $data['email'] }}</div>
        </div>
        
        <div class="field">
            <div class="label">Subject:</div>
            <div class="value">{{ $data['subject'] }}</div>
        </div>
        
        <div class="field">
            <div class="label">Message:</div>
            <div class="value">{{ $data['message'] }}</div>
        </div>
    </div>
    
    <div class="footer">
        <p>This email was sent from the DigiMarkt Project website contact form.</p>
        <p>© {{ date('Y') }} DigiMarkt Project - Digital Marketing Skills for TVET Institutions in Ghana</p>
    </div>
</body>
</html>
