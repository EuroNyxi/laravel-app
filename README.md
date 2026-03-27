# EuroNyxi: European Sovereign AI Assistant

## 1. What is EuroNyxi?
EuroNyxi is an open-source, privacy-focused AI assistant designed for **individuals and organizations** in Europe. It enables sovereign, secure, and ethical interactions with AI technologies while ensuring compliance with **GDPR** and European digital rights. Unlike mainstream AI tools, EuroNyxi prioritizes **data ownership**, **transparency**, and **decentralized control**, allowing users to host and manage their own instances without relying on non-European cloud providers or proprietary systems.

Built as a **monolithic Laravel application**, EuroNyxi integrates with European search engines, messaging platforms (e.g., Mattermost, Matrix, Nextcloud Talk), and other digital tools to provide a **unified, self-hosted assistant** for personal and professional use.

---

## 2. What is Digital Sovereignty?
**Digital sovereignty** refers to the ability of individuals, organizations, and governments to **control their own digital data, infrastructure, and technologies** without dependence on foreign entities. Key principles include:
- **Data Ownership**: Users retain full control over their data, including where it is stored and how it is processed.
- **Transparency**: No hidden algorithms, tracking, or proprietary black boxes.
- **Compliance**: Adherence to European regulations like **GDPR**, ePrivacy, and the **Digital Markets Act**.
- **Resilience**: Reduced reliance on non-European cloud providers or closed-source software.

EuroNyxi embodies these principles by:
- Using **European-hosted APIs** (e.g., Qwant, Mojeek for search).
- Supporting **self-hosting** on European infrastructure (e.g., Hetzner, Scaleway).
- Avoiding dependencies on U.S.-based tech giants (e.g., Google, Microsoft, or OpenAI).

---

## 3. Use Cases for EuroNyxi
### For Individuals
- **Personal AI Assistant**: Manage tasks, schedules, and notes without sharing data with third parties.
- **Privacy-First Search**: Web, document, and knowledge-base searches using **European search engines** (e.g., Qwant, SearXNG).
- **Unified Messaging**: Aggregate messages from **Matrix, Mattermost, Rocket.Chat, Nextcloud Talk, and DeltaChat** in one interface.
- **Nextcloud Integration**: Seamlessly connect with Nextcloud for file management, contacts, and collaborative tools.

### For Organizations
- **Company-Wide AI Tool**: Deploy on-premises or on European clouds for team collaboration, knowledge management, and workflow automation.
- **Compliance-Ready**: Meet GDPR and sector-specific regulations (e.g., healthcare, legal).
- **Custom Workflows**: Extend with connectors for **CRM, ERP, or internal databases**.
- **Federated Communication**: Bridge internal chats (e.g., Mattermost) with external partners via **Matrix or XMPP**.

### For Developers
- **Extensible Architecture**: Build custom connectors for European services (e.g., Odoo, Sovereign Cloud Stack).
- **Open Standards**: Leverage **ActivityPub**, **WebSockets**, and **OAuth2** for interoperability.
- **Local AI Models**: Integrate with **European LLM providers** (e.g., Mistral AI, Aleph Alpha) or self-hosted models (e.g., via **Hugging Face**).

---

## 4. Technical Notes
### Database Schema
This project uses **UUIDs** (Universally Unique Identifiers) as primary keys for all models instead of auto-incrementing integers. This improves security by avoiding predictable IDs and simplifies distributed data synchronization.

### Departments Model
The `departments` table supports organizational structures with:
- **UUID-based IDs** for departments and users.
- **Many-to-Many Relationship**: Users can belong to multiple departments, and departments can have multiple users.
- **Department Head**: Each department can have a designated head (user UUID).
- **Pivot Table**: `department_user` links users and departments.
- **Roles**: Users can have one of the following roles: `admin`, `user`, or `department_head`. Only admins can assign the `department_head` role.

---

## Getting Started
For setup instructions, see [SETUP.md](SETUP.md).

### Key Features
✅ **Self-Hosted**: Deploy on any PHP-compatible server (Docker, Forge, or shared hosting).
✅ **Multi-Platform Messaging**: Connect to **Matrix, Mattermost, Nextcloud Talk, and more**.
✅ **European Search**: Query **Qwant, Mojeek, or SearXNG** instead of Google/Brave.
✅ **Nextcloud Ready**: OAuth2 integration for files, talks, and contacts.
✅ **Real-Time Updates**: Laravel Echo + WebSockets for instant notifications.

### Roadmap
- [ ] Core Laravel backend (messaging, search, auth).
- [ ] Connectors for Matrix/Mattermost/Nextcloud.
- [ ] Frontend with **Livewire** or **Inertia.js**.
- [ ] Nextcloud app integration.
- [ ] Plugins for **calendar, tasks, and knowledge graphs**.

---

## Contributing
EuroNyxi is **community-driven**. Contributions are welcome!
- Report issues or suggest features via [GitHub Issues](https://github.com/EuroNyxi/laravel-app/issues).
- Submit pull requests for bug fixes or new connectors.
- Join the discussion in our [Matrix room](#) (link coming soon).

---

## License
**AGPL-3.0** – Ensures modifications remain open and accessible to the community.

*"Digital sovereignty is not a feature; it’s a foundation."*