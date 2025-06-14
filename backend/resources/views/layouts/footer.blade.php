<footer class="footer" id="contact">
    <div class="footer-top">
        <div class="footer-brand">
            <img src="{{ asset('assets/navbar/logo.png') }}" alt="Logo">

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
            <p class="email">BukooInfo@gmail.com</p>
            <div class="rating">
                <span class="badge">SU</span>
                <span class="label">Score for all ages</span>
            </div>
            <p class="address">Jl. Balai Pustaka Baru No. 2,<br>Rawamangun, Jakarta Timur.</p>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-question">
            <h3>If you didn't find the products<br>you are interested in or have questions?</h3>
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
    padding: 40px 20px;
    font-family: "Poppins", sans-serif;
    color: #333;
}

.footer-top {
    background-color: white;
    border-radius: 15px;
    padding: 30px;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-bottom: 30px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
}

.footer-brand {
    flex: 1 1 200px;
}

.footer-brand img {
    width: 60px;
    margin-bottom: 15px;
}

.social-icons {
    margin-top: 15px;
    display: flex;
    gap: 15px;
}

.social-icons a img {
    width: 30px;
    height: 30px;
}

.footer-links {
    flex: 2 1 300px;
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
}

.footer-links .column {
    flex: 1 1 120px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.footer-links h4 {
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 1rem;
}

.footer-links a {
    text-decoration: none;
    color: #333;
    font-size: 0.9rem;
    transition: color 0.2s;
}

.footer-links a:hover {
    color: #000;
}

.footer-contact {
    flex: 1 1 200px;
}

.call-btn {
    background: #000;
    color: #fff;
    padding: 10px 16px;
    border: none;
    border-radius: 4px;
    font-size: 0.9rem;
    cursor: pointer;
    margin-bottom: 15px;
    transition: background 0.2s;
}

.call-btn:hover {
    background: #333;
}

.email {
    font-size: 0.85rem;
    margin-bottom: 15px;
}

.rating {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    gap: 8px;
}

.badge {
    background: #69b04f;
    color: white;
    border-radius: 999px;
    padding: 5px 10px;
    font-size: 0.8rem;
    font-weight: 600;
}

.label {
    font-size: 0.8rem;
}

.address {
    font-size: 0.85rem;
    line-height: 1.4;
}

.footer-bottom {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 30px;
}

.footer-question h3 {
    color: white;
    font-size: 1.5rem;
    font-weight: 600;
    line-height: 1.3;
    margin-bottom: 20px;
}

.contact-form {
    flex: 1 1 300px;
    display: flex;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 30px;
    overflow: hidden;
    backdrop-filter: blur(5px);
    max-width: 500px;
}

.contact-form input {
    border: none;
    padding: 12px 20px;
    outline: none;
    flex: 1;
    background: transparent;
    color: white;
    font-family: "Poppins", sans-serif;
}

.contact-form input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.contact-form button {
    border: none;
    background: transparent;
    color: white;
    padding: 0 20px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: transform 0.2s;
}

.contact-form button:hover {
    transform: translateX(3px);
}


@media (max-width: 992px) {
    .footer-top {
        gap: 40px;
    }

    .footer-links {
        gap: 60px;
    }

    .footer-question h3 {
        font-size: 1.3rem;
    }
}

@media (max-width: 768px) {
    .footer {
        margin-top: 60px;
        padding: 30px 15px;
    }

    .footer-top {
        padding: 25px;
        flex-direction: column;
        gap: 30px;
    }

    .footer-links {
        gap: 40px;
    }

    .footer-bottom {
        flex-direction: column;
        align-items: flex-start;
    }

    .footer-question h3 {
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    .contact-form {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .footer {
        padding: 25px 10px;
    }

    .footer-top {
        padding: 20px;
        border-radius: 10px;
    }

    .footer-links {
        flex-direction: column;
        gap: 25px;
    }

    .footer-question h3 {
        font-size: 1.1rem;
    }

    .contact-form input {
        padding: 10px 15px;
    }

    .contact-form button {
        padding: 0 15px;
    }
}
</style>
