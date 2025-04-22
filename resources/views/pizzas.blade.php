<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .pizza-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .pizza-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .pizza-card:hover {
            transform: translateY(-5px);
        }

        .pizza-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .pizza-details {
            padding: 15px;
        }

        .pizza-name {
            font-size: 1.2rem;
            margin: 0 0 10px;
            color: #333;
        }

        .veg-indicator {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
        }

        .veg {
            background-color: green;
        }

        .non-veg {
            background-color: red;
        }

        .pizza-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .price-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .base-price {
            font-weight: bold;
            font-size: 1.1rem;
            color: #e63946;
        }

        .crust-options {
            margin-top: 10px;
            font-size: 0.9rem;
        }

        .crust-option {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            padding: 5px 0;
            border-bottom: 1px dashed #eee;
        }

        .error {
            color: red;
            font-size: 1.2rem;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Our Pizza Menu</h1>
        <!-- Display error if there's a problem -->
        @if (isset($error))
        <div class="error">
            <p>Error: {{ $error }}</p>
        </div>
        @else
        <!-- If data exists, display in grid format -->
        <div class="pizza-grid">
            @foreach ($data as $pizza)
            <div class="pizza-card">
                <img src="{{ $pizza['img'] }}" alt="{{ $pizza['name'] }}" class="pizza-image">
                <div class="pizza-details">
                    <h3 class="pizza-name">
                        <span class="veg-indicator {{ $pizza['veg'] ? 'veg' : 'non-veg' }}"></span>
                        {{ $pizza['name'] }}
                    </h3>
                    <p class="pizza-description">{{ $pizza['description'] }}</p>

                    <div class="price-section">
                        <span class="base-price">${{ $pizza['price'] }}</span>
                        <span>Qty: {{ $pizza['quantity'] }}</span>
                    </div>

                    <div class="crust-options">
                        <h4>Crust Options:</h4>
                        @foreach ($pizza['sizeandcrust'][0] as $crustType => $crustDetails)
                        <div class="crust-option">
                            <span>{{ str_replace(['mediumPan', 'mediumstuffedcrust', 'cheesemax', 'vegkebab', 'chickenseekhkebab'], 
                                ['Pan', 'Stuffed Crust', 'Cheese Max', 'Veg Kebab', 'Chicken Seekh Kebab'], $crustType) }}:</span>
                            <span>${{ $crustDetails[0]['price'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</body>

</html>