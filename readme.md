<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h1>🛍️ BDShop - eCommerce Website</h1>

  <p><strong>BDShop</strong> is a simple and functional eCommerce web application built with <strong>Laravel</strong>. It allows users to browse products, add them to cart, and place orders. The system also includes an admin panel for managing products, categories, and customer orders.</p>

  <h2>✨ Key Features</h2>
  <ul>
    <li>User registration and login</li>
    <li>Product browsing with categories and search</li>
    <li>Shopping cart and order placement</li>
    <li>Admin dashboard for product and order management</li>
    <li>Image upload for product thumbnails</li>
    <li>Responsive design for mobile and desktop</li>
  </ul>

  <h2>🛠️ Tech Stack</h2>
  <ul>
    <li><strong>Backend:</strong> Laravel (PHP)</li>
    <li><strong>Frontend:</strong> Blade templates, HTML, CSS, JavaScript</li>
    <li><strong>Database:</strong> MySQL</li>
    <li><strong>Authentication:</strong> Laravel Breeze / Laravel UI</li>
    <li><strong>Image Handling:</strong> Laravel File Storage</li>
  </ul>

  <h2>⚙️ Installation</h2>
  <ol>
    <li>Clone the project:
      <pre><code>git clone https://github.com/csemiraz/bdshop.git
cd bdshop</code></pre>
    </li>
    <li>Install dependencies:
      <pre><code>composer install
npm install && npm run dev</code></pre>
    </li>
    <li>Copy and configure the environment file:
      <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
    </li>
    <li>Set database credentials in <code>.env</code>.</li>
    <li>Run migrations:
      <pre><code>php artisan migrate</code></pre>
    </li>
    <li>(Optional) Seed demo data:
      <pre><code>php artisan db:seed</code></pre>
    </li>
    <li>Start the development server:
      <pre><code>php artisan serve</code></pre>
    </li>
    <li>Open in browser: <a href="http://localhost:8000">http://localhost:8000</a></li>
  </ol>

  <h2>🙌 Contributions</h2>
  <p>Feel free to contribute by forking the repo and submitting pull requests with improvements or bug fixes.</p>

  <h2>📄 License</h2>
  <p>This project is licensed under the <a href="LICENSE">MIT License</a>.</p>
</body>
</html>
