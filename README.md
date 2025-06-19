# HiveMind - Plataforma Comunitaria Segura con Laravel y Tailwind

**Autor/a**: María Nisa Merchán  
**Proyecto Integrado | 2º ASIR**

## 🎯 Objetivo del Proyecto

El objetivo de **HiveMind** es desarrollar una plataforma comunitaria segura y autogestionada, implementando un blog colaborativo desarrollado con Laravel y Tailwind CSS, que permite a usuarios autenticados publicar, editar y eliminar contenido. El proyecto ha sido desplegado en una infraestructura on-premise basada en Debian 12, con enfoque en la seguridad, el rendimiento y la escalabilidad.

## 🛠️ Tecnologías y Herramientas Utilizadas

- **Laravel Breeze**: para la autenticación de usuarios.
- **Tailwind CSS**: diseño visual responsive y moderno.
- **Docker + Kubernetes (K3S)**: para el despliegue y orquestación del entorno de producción.
- **MySQL**: como sistema de gestión de base de datos.
- **Cloudflare + Nominalia**: gestión de DNS y certificados SSL.
- **Wazuh + Suricata**: monitorización, IDS y análisis de seguridad.

---

## 📦 Estructura del Proyecto

El backend y frontend están implementados en Laravel siguiendo el patrón MVC:

- **Modelos**: representan la estructura de los datos (`Post.php`).
- **Controladores**: lógica de negocio y flujo de datos (`PostController.php`, `ProfileController.php`).
- **Vistas**: interfaz de usuario con Blade (`create.blade.php`, `dashboard.blade.php`, etc.).
- **Rutas**: definidas en `routes/web.php`.
- **Migraciones**: para estructurar la base de datos.

---

## 🚀 Despliegue e Infraestructura

### Entorno On-Premise

1. Instalación de dependencias (PHP, MySQL, Node.js).
2. Configuración de Laravel y conexión a base de datos.
3. Generación del entorno con Breeze y migraciones.
4. Acceso al panel desde un VPS a través de dominio personalizado.

### Docker y Kubernetes (K3S)

- Creación de imagen Docker del proyecto.
- Subida a Docker Hub.
- Despliegue mediante `deployment.yaml`, `service.yaml` e `ingress.yaml`.
- Orquestación y exposición del servicio desde el clúster.

---

## 🔐 Seguridad Integrada

### Protección del Blog

- **Cloudflare**:
  - Protección ante bots y ataques DDoS.
  - Certificados SSL gestionados.
  - Monitorización de tráfico y acceso por país/dispositivo.

- **Wazuh**:
  - Monitorización de accesos y logs del sistema.
  - Reglas personalizadas para alertas específicas del blog.

- **Suricata**:
  - Detección de tráfico sospechoso.
  - Integración con Wazuh para alertas IDS.

---

## ✨ Funcionalidades Principales

- Registro e inicio de sesión de usuarios.
- Panel de usuario con gestión de perfil.
- CRUD completo para publicaciones:
  - Crear, visualizar, editar y eliminar posts.
- Sistema seguro con monitorización y dominio HTTPS.

---

## 🌐 Acceso

El blog está accesible desde un dominio personalizado protegido por Cloudflare.  
> 💡 Solo los usuarios autenticados pueden interactuar con el contenido del blog.

---

## 📊 Análisis y Paneles

- Paneles visuales personalizados creados en Wazuh.
- Notificaciones horarias sobre intentos de login fallidos.
- Registro de actividad de red con Suricata.

---

## 📚 Recursos

- [Laravel Docs](https://laravel.com/docs)
- [Tailwind CSS Docs](https://tailwindcss.com/docs)
- [Wazuh](https://wazuh.com)
- [Suricata](https://suricata.io/)
- [Cloudflare](https://www.cloudflare.com)

---

## ✅ Conclusión

**HiveMind** cumple los objetivos definidos ofreciendo una plataforma robusta, segura y escalable para la creación de contenido comunitario. El enfoque DevSecOps, junto al despliegue automatizado y el uso de herramientas modernas, lo convierten en una solución ideal para entornos autogestionados.

---


