<?php require "./views/Components/Head.php" ?>

<script type="text/javascript" src="http://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-cbiugUUXzP_WNrv0"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

<body>
  <button id="pay-button">Pay!</button>

  <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
  <div id="snap-container"></div>

  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
      // Also, use the embedId that you defined in the div above, here.
      window.snap.embed('<?= $data['snapToken'] ?>', {
        embedId: 'snap-container'
      });
    });
  </script>
</body>


<?php require "./views/Components/Foot.php" ?>