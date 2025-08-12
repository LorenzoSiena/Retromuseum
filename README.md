# Retromuseum Rebirth 🎮

A nostalgic e-commerce platform dedicated to retro gaming consoles and classic video games. Built with Laravel and featuring a dynamic showcase of gaming history.

## 🎯 Project Overview

Retromuseum Rebirth is a modern web application that celebrates retro gaming culture by providing an interactive platform where users can explore, discover, and purchase classic gaming consoles and their most iconic games. The application combines modern web technologies with nostalgic gaming aesthetics.

## 🏗️ Technical Architecture

### Backend
- **Framework**: Laravel 10.x
- **Database**: MySQL with Eloquent ORM
- **Authentication**: Laravel Sanctum
- **Caching**: Redis-ready architecture
- **API**: RESTful endpoints for game data

### Frontend
- **Template Engine**: Blade (Laravel)
- **JavaScript**: Vanilla JS with modern ES6+ features
- **Styling**: Responsive CSS with mobile-first approach
- **Assets**: Vite for build optimization

### External Integrations
- **RAWG Video Games Database**: Dynamic game information and metadata
- **Cloud Storage**: Product image management
- **Payment Processing**: Ready for Stripe/PayPal integration

## 🎮 Key Features

### Dynamic Game Showcase
- **Auto-rotating displays**: Every 30 seconds, featured games change automatically
- **Console-specific sections**: Dedicated areas for NES, Sega, Atari, and more
- **Rich game data**: Release years, descriptions, cover art, and historical context

### E-commerce Capabilities
- **Product catalog**: Comprehensive inventory management
- **Shopping cart**: Session-based cart system
- **Order management**: Complete order lifecycle from cart to shipment
- **User accounts**: Registration, authentication, and profile management

### Search & Discovery
- **Real-time search**: Instant product search with debouncing
- **Category filtering**: Browse by console type or game genre
- **Featured collections**: Curated lists of must-play classics

## 🗂️ Database Schema

### Core Tables
- **Products**: Game inventory with pricing, descriptions, and stock levels
- **Users**: Customer accounts with authentication
- **Orders**: Purchase history and order tracking
- **Cart Sessions**: Temporary shopping cart storage

### Relationships
- One-to-many: Users → Orders
- Many-to-many: Orders → Products
- Product categorization by console type and genre

## 🚀 API Endpoints

### Public Endpoints
- `GET /api/games` - Fetch all games with pagination
- `GET /api/games/{console}` - Games filtered by console
- `GET /api/games/search?q={query}` - Search games by name
- `GET /api/consoles` - Available console types

### Authenticated Endpoints
- `POST /cart/add` - Add item to shopping cart
- `GET /cart` - Retrieve current cart contents
- `POST /orders` - Create new order
- `GET /orders/history` - User order history

## 🎨 User Experience

### Homepage Features
- **Hero section**: Rotating showcase of iconic games
- **Console spotlights**: Dedicated sections for NES, Sega Genesis, Atari 2600
- **Featured games**: Hand-picked classics with rich media
- **Responsive design**: Optimized for desktop, tablet, and mobile

### Shopping Flow
1. **Browse**: Explore games by console or search
2. **Discover**: View detailed game information and images
3. **Add to Cart**: Simple one-click purchasing
4. **Checkout**: Streamlined order process
5. **Track**: Order status and shipping updates

## 🔧 Development Setup

### Prerequisites
- PHP 8.1+
- Composer
- MySQL 8.0+
- Node.js 16+
- Redis (optional, for caching)

### Installation
```bash
# Clone repository
git clone [repository-url]
cd retromuseum-rebirth

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed

# Build assets
npm run build

# Start development server
php artisan serve
```

### Environment Variables
```env
APP_NAME="Retromuseum Rebirth"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=retromuseum
DB_USERNAME=root
DB_PASSWORD=

RAWG_API_KEY=your-rawg-api-key
```

## 🛡️ Security Features

- **API Key Protection**: RAWG API keys secured on backend
- **Rate Limiting**: Prevents API abuse
- **Input Validation**: Comprehensive request validation
- **CSRF Protection**: Laravel built-in security
- **SQL Injection Prevention**: Eloquent ORM protection

## 📱 Responsive Design

- **Mobile-first approach**: Optimized for smartphones
- **Tablet optimization**: Enhanced tablet experience
- **Desktop layout**: Rich desktop interface
- **Touch-friendly**: Optimized for touch interactions

## 🎯 Performance Optimizations

- **Image optimization**: Automatic resizing and compression
- **Lazy loading**: Images load as needed
- **Caching**: Redis for API responses
- **CDN ready**: Asset optimization for production
- **Database indexing**: Optimized query performance

## 🔄 Continuous Integration

- **Testing**: PHPUnit for backend, Jest for frontend
- **Code quality**: PSR-12 coding standards
- **Deployment**: GitHub Actions ready
- **Monitoring**: Laravel Telescope for debugging

## 🌟 Future Enhancements

- **Wishlist functionality**: Save games for later
- **User reviews**: Community-driven ratings
- **Price alerts**: Notify on price drops
- **Social features**: Share collections
- **Advanced filtering**: By year, genre, rating
- **Multi-language support**: International expansion

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

## 🤝 Contributing

Contributions are welcome! Please read our [Contributing Guide](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

## 📞 Support

For support, email support@retromuseumrebirth.com or join our Discord community.

---

**Built with ❤️ for retro gaming enthusiasts**
