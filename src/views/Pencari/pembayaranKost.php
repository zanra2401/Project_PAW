<?php require "./views/Components/Head.php" ?>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-cbiugUUXzP_WNrv0"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

<body>
  <form method="POST" action="/<?= PROJECT_NAME ?>/pencari/gerbangpembayaran">
    <button>pay</button>
  </form>

  <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
   <div class="w-screen h-screen flex items-center justify-center">
       <div id="snap-container">
     
       </div>
   </div>

  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    <?php if(isset($data['snapToken'])): ?>
      window.snap.embed('<?= $data['snapToken'] ?>', {
        embedId: 'snap-container'
      });
    <?php endif; ?>
  </script>
</body>


<?php require "./views/Components/Foot.php" ?>