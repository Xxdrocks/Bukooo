<footer class="footer">
    <div class="footer-top">
        <div class="footer-brand">
            <img src="{{ asset('assets/navbar/logo.png') }}" alt="Logo">
            <div class="social-icons">
                <a href="#"><img src="{{ asset('assets/icons/ig.svg') }}" alt="Instagram"></a>
                <a href="#"><img src="{{ asset('assets/icons/mail.svg') }}" alt="Email"></a>
            </div>
        </div>
        <div class="footer-links">
            <div class="column">
                <h4>Information</h4>
                <a href="#">Privacy</a>
                <a href="#">FAQ</a>
                <a href="#">Payment</a>
                <a href="#">Partners</a>
                <a href="#">Blog</a>
                <a href="#">Contacts</a>
            </div>
            <div class="column">
                <h4>Menu</h4>
                <a href="#">Home</a>
                <a href="#">Shop</a>
                <a href="#">My Books</a>
            </div>
        </div>
        <div class="footer-contact">
            <button class="call-btn">Request a call</button>
            <p class="email">info@bukukosakasanku.com</p>
            <div class="rating">
                <span class="badge">SU</span>
                <span class="label">Score for all ages</span>
            </div>
            <p class="address">Jl. Balai Pustaka Baru No. 2,<br>Rawamangun, Jakarta Timur.</p>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-question">
            <h3>If you didn’t find the products<br>you are interested in or have questions?</h3>
        </div>
        <form class="contact-form">
            <input type="email" placeholder="Your email..." required>
            <button type="submit">→</button>
        </form>
    </div>
</footer>

<style>
   .footer {
    margin-top: 100px;
    background: url('/assets/background/bg.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 60px 20px;
    font-family: Arial, sans-serif;
    color: #333;
}

.footer-top {
    background-color: white;
    border-radius: 15px;
    padding: 40px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-bottom: 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
}

.footer-brand {
    flex: 1;
    min-width: 200px;
    margin-bottom: 20px;
}

.footer-brand a {
    padding-top: 50px;
    text-decoration: none;
    color: #333;
}
.footer-brand img {
    width: 60px;
    margin-bottom: 20px;
}
.social-icons {
    margin-top: 10px;
}
.social-icons a img {
    width: 30px;
    margin-right: 15px;
}

.footer-links {
    flex: 2;
    display: flex;
    justify-content: center;
    gap: 80px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}
.footer-links .column {
    display: flex;
    flex-direction: column;
}
.footer-links h4 {
    font-weight: bold;
    margin-bottom: 10px;
    font-size: 1rem;
}
.footer-links a {
    margin-bottom: 6px;
    text-decoration: none;
    color: #333;
    font-size: 0.9rem;
}

.footer-contact {
    flex: 1;
    min-width: 200px;
    margin-bottom: 20px;
}
.call-btn {
    background: #000;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    font-size: 0.9rem;
    cursor: pointer;
    margin-bottom: 10px;
}
.email {
    font-size: 0.85rem;
    margin-bottom: 10px;
}
.rating {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}
.badge {
    background: #69b04f;
    color: white;
    border-radius: 999px;
    padding: 5px 10px;
    font-size: 0.8rem;
    margin-right: 10px;
}
.label {
    font-size: 0.8rem;
}
.address {
    font-size: 0.85rem;
    margin-top: 10px;
}

.footer-bottom {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}

.footer-question h3 {
    color: white;
    font-size: 1.5rem;
    max-width: 400px;
    font-weight: bold;
}

.contact-form {
    flex: 1;
    min-width: 280px;
    display: flex;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 30px;
    overflow: hidden;
    backdrop-filter: blur(5px);
}
.contact-form input {
    border: none;
    padding: 12px 16px;
    outline: none;
    flex: 1;
    background: transparent;
    color: white;
}
.contact-form input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}
.contact-form button {
    border: none;
    background: transparent;
    color: white;
    padding: 12px 20px;
    font-size: 1.2rem;
    cursor: pointer;
}


</style>
