<!DOCTYPE html>
<?php get_header(); ?>

  <main>
    <section class="hero" id="home">
      <header>
        <h1 class="visually-hidden">SuperShoes</h1>
        <p class="h1 text-white">
          <span class="bg-primary">Ici, on répare vos chaussures</span><br>
          <small class="bg-secondary">pour que vous repartiez du bon pied</small>
        </p>
        <a href="#about" class="please-scroll">Scrollez vers le bas</a>
      </header>
    </section>
    <section class="container section about" id="about">
      <div class="row align-items-center">
        <div class="col-md">
          <header>
            <h2 class="mb-3">Notre entreprise</h2>
          </header>
          <p class="lead">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt reprehenderit hic eligendi assumenda quos animi consequatur tenetur atque nam. Quos aspernatur placeat fuga excepturi veritatis eos eveniet nemo magni facere.
          </p>
        </div>
        <div class="col-md">
          <img class="img-fluid" src="images/about.jpg" alt="cordonnier au travail">
        </div>
      </div>
    </section>
    <section class="container section services" id="services">
      <header>
        <h2 class="text-center mb-3">Nos services</h2>
      </header>
      <?php
        $services = new WP_Query([
          'post_type' => 'services',
          'post_status' => 'publish',
          'limit' => 3,
          'orderby' => 'date',
          'date' => true
        ]);

        if ($services->have_posts()):
      ?>
        <div class="row">
          <?php while ($services->have_posts()): $services->the_post(); ?>
            <div class="col-sm">
              <div class="card">
                <img 
                  src="<?php the_post_thumbnail_url(); ?>"
                  class="card-img-top"
                  alt="<?php the_title() ?> | service | <?php echo bloginfo('name'); ?>"
                >
                <div class="card-body">
                  <h3 class="card-title h5"><?php the_title(); ?></h3>
                  <p class="card-text"><?php the_content(); ?></p>
                </div><!-- end .card-body -->
              </div><!-- end .card -->
            </div><!-- end .col-sm -->
          <?php endwhile; ?>
        </div><!-- end .row -->
      <?php else: ?>
        <h5>On a pas encore de services a vous proposer mais ça arrive !</h5>
      <?php endif; ?>
    </section>
    <div class="container section contact" id="contact">
      <header>
        <h2 class="text-center mb-3">Contactez-nous</h2>
      </header>
      <div class="row">
        <form action="#" class="col-md">
          <p class="form-group">
            <label for="name">Votre nom et prénom</label>
            <input name="name" id="name" type="text" class="form-control">
          </p>
          <p class="form-group">
            <label for="subject">Sujet</label>
            <select name="subject" id="subject" class="form-control">
              <option value="0">Choisissez un sujet</option>
              <option value="devis">Demande de devis</option>
              <option value="question">Question</option>
              <option value="other">Autres</option>
            </select>
          </p>
          <p class="form-group">
            <label for="message">Votre message</label>
            <textarea name="message" id="message" class="form-control" rows="5"></textarea>
          </p>
          <p class="text-right">
            <button class="btn btn-primary">Envoyer</button>
          </p>
        </form>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10987.242951252556!2d4.37044401754503!3d50.85271187329156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c370c43d6195%3A0x94b0e4b9ad97de02!2sHaute%20%C3%89cole%20ISFSC!5e0!3m2!1sfr!2sbe!4v1602328508492!5m2!1sfr!2sbe" class="col-md-8 contact-map" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </main>

<?php get_footer(); ?>
