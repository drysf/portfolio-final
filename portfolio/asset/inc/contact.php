<section id="contact">
    <h2>CONTACT</h2>
    <div class="login-box">
      <form id="form-contact" action="../../../portfolio/asset/config/traitement-mail.php" method="POST" target="iframeRedirecting">
        <div class="user-box">
          <input type="text" name="email" required="" id="email">
          <label for="email">Votre Email</label>
        </div>
        <div class="user-box">
          <textarea name="message" id="message" cols="30" rows="10"></textarea>
          <label for="message">Votre Message</label>
        </div>
        <a id="validTheButtonUsingScipt" onclick="envoi_formulaire()">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Envoyer
        </a>
        <button id="validWithScript" style="display: none;"></button>
      </form>
    </div>
    
    <div id="submitMessage">Votre message a été envoyé avec succès!</div>

  </section>
  
