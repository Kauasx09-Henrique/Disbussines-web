<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="tailwindcss-colors.css">
    <link rel="stylesheet" href="../css/pagamentostyle.css">
    <title>Payment Page</title>
</head>
<body>

    
    
    <!-- start: Payment -->
    <section class="payment-section">
        <div class="container">
            <div class="payment-wrapper">
                <div class="payment-left">
                    <div class="payment-header">
                        <div class="payment-header-icon"><i class="ri-flashlight-fill"></i></div>
                        <div class="payment-header-title">Order Summary</div>
                        <p class="payment-header-description">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    </div>
                    <div class="payment-content">
                        <div class="payment-body">
                            <div class="payment-plan">
                                <div class="payment-plan-type">Pro</div>
                                <div class="payment-plan-info">
                                    <div class="payment-plan-info-name">Professional Plan</div>
                                    <div class="payment-plan-info-price">$35 Por Mês</div>
                                </div>
                                <a href="#" class="payment-plan-change">Change</a>
                            </div>
                            <div class="payment-summary">
                                <div class="payment-summary-item">
                                    <div class="payment-summary-name">Imposto</div>
                                    <div class="payment-summary-price">$0</div>
                                </div>
                                <div class="payment-summary-item">
                                    <div class="payment-summary-name">Desconto 20%</div>
                                    <div class="payment-summary-price">-$84</div>
                                </div>
                                <div class="payment-summary-divider"></div>
                                <div class="payment-summary-item payment-summary-total">
                                    <div class="payment-summary-name">Total</div>
                                    <div class="payment-summary-price">$330</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="payment-right">
                    <form id="payment-form" action="paguserpremium.php" method="POST">
                        <h1 class="payment-title">Payment Details</h1>
                        <div class="payment-method">
                            <input type="radio" name="payment-method" id="method-1" checked>
                            <label for="method-1" class="payment-method-item">
                                <img src="../img/visa.png" alt="">
                            </label>
                            <input type="radio" name="payment-method" id="method-2">
                            <label for="method-2" class="payment-method-item">
                                <img src="../img/mastercard.png" alt="">
                            </label>
                            <input type="radio" name="payment-method" id="method-3">
                            <label for="method-3" class="payment-method-item">
                                <img src="../img/paypal.png" alt="">
                            </label>
                            <input type="radio" name="payment-method" id="method-4">
                            <label for="method-4" class="payment-method-item">
                                <img src="../img/stripe.png" alt="">
                            </label>
                        </div>
                        <div class="payment-form-group">
                            <input type="email" placeholder=" " class="payment-form-control" id="email">
                            <label for="email" class="payment-form-label payment-form-label-required">Email Address</label>
                        </div>
                        <div class="payment-form-group">
                            <input type="text" placeholder=" " class="payment-form-control" id="card-number">
                            <label for="card-number" class="payment-form-label payment-form-label-required">Card Number</label>
                        </div>
                        <div class="payment-form-group-flex">
                            <div class="payment-form-group">
                                <input type="date" placeholder=" " class="payment-form-control" id="expiry-date">
                                <label for="expiry-date" class="payment-form-label payment-form-label-required">Expiry Date</label>
                            </div>
                            <div class="payment-form-group">
                                <input type="text" placeholder=" " class="payment-form-control" id="cvv">
                                <label for="cvv" class="payment-form-label payment-form-label-required">CVV</label>
                            </div>
                        </div>
                            <button type="submit" class="payment-form-submit-button" onclick="exibirAlertaAntesDeEnviar(event)">
                                <i class="ri-wallet-line"></i> Pay
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Payment -->
    <script>
        function exibirAlertaAntesDeEnviar(event) {
            event.preventDefault(); // Evita o envio imediato do formulário
            alert("Você está prestes a realizar o pagamento.");
            document.getElementById("payment-form").submit(); // Envia o formulário após o alerta
        }
    </script>
</body>
</html>