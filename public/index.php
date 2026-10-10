<?php

// Check static file request
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if ($uri !== '/' && file_exists(__DIR__ . $uri) && !is_dir(__DIR__ . $uri)) {
    return false; // serve static file directly
}

// Lightweight Collection helper class for template compatibility
if (!class_exists('SimpleCollection')) {
    class SimpleCollection implements \ArrayAccess, \Countable, \IteratorAggregate {
        protected $items;
        public function __construct($items = []) {
            $this->items = is_array($items) ? $items : [];
        }
        public function count(): int { return count($this->items); }
        public function take($limit) { return new self(array_slice($this->items, 0, $limit)); }
        public function isEmpty() { return empty($this->items); }
        public function getIterator(): \Traversable { return new \ArrayIterator($this->items); }
        public function offsetExists($o): bool { return isset($this->items[$o]); }
        #[\ReturnTypeWillChange]
        public function offsetGet($o) { return $this->items[$o] ?? null; }
        public function offsetSet($o, $v): void { $this->items[$o] = $v; }
        public function offsetUnset($o): void { unset($this->items[$o]); }
    }
}

if (!function_exists('collect')) {
    function collect($items = []) {
        return new SimpleCollection($items);
    }
}

if (!function_exists('session')) {
    function session($key = null, $default = null) {
        return null;
    }
}

if (!function_exists('old')) {
    function old($key = null, $default = null) {
        return $default;
    }
}

// Data definitions matching PortfolioController
$services = [
    (object)[
        'id' => 1,
        'title' => 'Enterprise Software',
        'slug' => 'enterprise-software',
        'tagline' => 'ERP, CRM & Business Management Systems',
        'description' => 'Custom enterprise solutions including ERP, CRM, and business management systems engineered for scaling organizations.',
        'icon' => 'globe',
        'features' => ['ERP Systems', 'CRM Solutions', 'Business Intelligence', 'Workflow Automation'],
        'tech_stack' => ['Laravel', 'React', 'PostgreSQL', 'Docker'],
        'order' => 1,
        'is_featured' => true,
    ],
    (object)[
        'id' => 2,
        'title' => 'Web Development',
        'slug' => 'web-development',
        'tagline' => 'Modern & Responsive Web Applications',
        'description' => 'Modern, responsive websites and web applications built with cutting-edge technologies and optimized for peak speed.',
        'icon' => 'network',
        'features' => ['Custom Web Apps', 'E-commerce Platforms', 'CMS Solutions', 'API Development'],
        'tech_stack' => ['Vue 3', 'React', 'Tailwind CSS', 'Laravel'],
        'order' => 2,
        'is_featured' => true,
    ],
    (object)[
        'id' => 3,
        'title' => 'Mobile Applications',
        'slug' => 'mobile-applications',
        'tagline' => 'iOS & Android Native & Cross-Platform Apps',
        'description' => 'Native and cross-platform mobile apps for iOS and Android devices with intuitive user experiences and offline capabilities.',
        'icon' => 'smartphone',
        'features' => ['iOS Applications', 'Android Applications', 'Cross-platform Solutions', 'App Maintenance & Support'],
        'tech_stack' => ['Flutter', 'React Native', 'iOS', 'Android'],
        'order' => 3,
        'is_featured' => true,
    ],
    (object)[
        'id' => 4,
        'title' => 'Automation Solutions',
        'slug' => 'automation-solutions',
        'tagline' => 'Intelligent RPA & Workflow Automation',
        'description' => 'Streamline your business operations with intelligent automation, robotic process automation (RPA), and real-time data pipelines.',
        'icon' => 'cpu',
        'features' => ['Process Automation', 'RPA Implementation', 'Data Pipelines', 'System Integration'],
        'tech_stack' => ['Python', 'Node.js', 'RPA', 'Zapier'],
        'order' => 4,
        'is_featured' => true,
    ],
    (object)[
        'id' => 5,
        'title' => 'Custom Software',
        'slug' => 'custom-software',
        'tagline' => 'Tailored Software Solutions for Unique Needs',
        'description' => 'Tailored software solutions designed specifically for your unique business requirements and digital growth strategy.',
        'icon' => 'cloud',
        'features' => ['Desktop Applications', 'Cloud Solutions', 'SaaS Products', 'Legacy Modernization'],
        'tech_stack' => ['Cloud', 'SaaS', 'Microservices', 'REST API'],
        'order' => 5,
        'is_featured' => true,
    ],
    (object)[
        'id' => 6,
        'title' => 'Security & Compliance',
        'slug' => 'security-compliance',
        'tagline' => 'Robust Security & Data Protection',
        'description' => 'Robust security solutions to protect your digital assets, ensure regulatory compliance, and safeguard critical business infrastructure.',
        'icon' => 'shield-check',
        'features' => ['Security Audits', 'Data Protection', 'Compliance Consulting', 'Penetration Testing'],
        'tech_stack' => ['Security Audits', 'SSL', 'OAuth2', 'Encryption'],
        'order' => 6,
        'is_featured' => true,
    ],
];

$projects = [
    (object)[
        'id' => 1,
        'title' => 'NexusPay: Multi-Currency Enterprise Settlement Gateway',
        'slug' => 'nexuspay-settlement-gateway',
        'client_name' => 'Nexus Global Financials Ltd.',
        'category' => 'web',
        'tagline' => 'Sub-40ms high-throughput payment orchestrator processing $140M+ monthly.',
        'summary' => 'DevTZ architected a fault-tolerant payment rail connecting 14 African & EU banking protocols with real-time settlement ledgers.',
        'challenge' => 'The client faced high transaction failure rates and sluggish ledger reconciliations under peak traffic, with legacy monolithic bottlenecks causing timeouts.',
        'solution' => 'Engineered an event-driven Laravel Octane & Redis cluster architecture with optimistic lock isolation, idempotency validation, and automated compliance auditing.',
        'banner_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
        'screenshots' => [
            'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
        ],
        'live_url' => 'https://devtz.site',
        'github_url' => 'https://github.com/DevTZ',
        'tech_stack' => ['Laravel', 'Vue 3', 'Redis Cluster', 'PostgreSQL', 'Tailwind CSS'],
        'metrics' => collect([
            (object)['id' => 1, 'label' => 'Monthly Volume Processed', 'value' => '$140M+'],
            (object)['id' => 2, 'label' => 'Avg API Response Time', 'value' => '32ms'],
            (object)['id' => 3, 'label' => 'Transaction Success Rate', 'value' => '99.98%'],
        ]),
    ],
    (object)[
        'id' => 2,
        'title' => 'OmniPulse: Telehealth & Clinical Workflow Platform',
        'slug' => 'omnipulse-telehealth-platform',
        'client_name' => 'OmniHealth Technologies',
        'category' => 'mobile',
        'tagline' => 'HIPAA-compliant cross-platform mobile clinic ecosystem with live encrypted WebRTC video.',
        'summary' => 'Complete patient triage, electronic health record (EHR) synchronization, and doctor scheduling engine used across 60+ clinics.',
        'challenge' => 'Existing legacy native iOS/Android apps suffered from fragmented feature parity, frequent sync conflicts in low-connectivity areas, and HIPAA compliance risks.',
        'solution' => 'Developed a unified Flutter cross-platform architecture with local encrypted SQLite offline caching, automated syncing algorithms, and end-to-end encrypted WebRTC consultations.',
        'banner_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80',
        'screenshots' => [
            'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=1200&q=80',
        ],
        'live_url' => 'https://devtz.site',
        'github_url' => 'https://github.com/DevTZ',
        'tech_stack' => ['Flutter', 'Dart', 'Laravel API', 'WebRTC', 'PostgreSQL'],
        'metrics' => collect([
            (object)['id' => 4, 'label' => 'Active Clinic Users', 'value' => '120,000+'],
            (object)['id' => 5, 'label' => 'Video Consult Reliability', 'value' => '99.95%'],
            (object)['id' => 6, 'label' => 'Sync Conflict Reduction', 'value' => '94%'],
        ]),
    ],
    (object)[
        'id' => 3,
        'title' => 'AeroCloud: Automated Kubernetes Fleet Orchestrator',
        'slug' => 'aerocloud-kubernetes-orchestrator',
        'client_name' => 'AeroSystems Cloud Corp',
        'category' => 'cloud',
        'tagline' => 'Autonomous multi-cloud management engine automating canary rollouts and zero-downtime scaling.',
        'summary' => 'DevTZ created an infrastructure automation control plane that orchestrates thousands of containers across AWS and Bare-Metal nodes.',
        'challenge' => 'Manual deployments and configuration drift between staging and multi-region clusters resulted in frequent production incidents and bloated AWS costs.',
        'solution' => 'Built an autonomous CI/CD control panel with GitOps pipelines, Prometheus metrics autoscaling, and automated cost optimization algorithms.',
        'banner_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1200&q=80',
        'screenshots' => [
            'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1200&q=80',
        ],
        'live_url' => 'https://devtz.site',
        'github_url' => 'https://github.com/DevTZ',
        'tech_stack' => ['Go', 'Laravel', 'Kubernetes', 'Terraform', 'AWS EKS', 'Prometheus'],
        'metrics' => collect([
            (object)['id' => 7, 'label' => 'Infrastructure Cost Cut', 'value' => '42%'],
            (object)['id' => 8, 'label' => 'Deployment Time', 'value' => '< 90s'],
            (object)['id' => 9, 'label' => 'Automated Healing Events', 'value' => '10k+/mo'],
        ]),
    ],
    (object)[
        'id' => 4,
        'title' => 'CogniSearch: Enterprise RAG Semantic Engine',
        'slug' => 'cognisearch-enterprise-rag-engine',
        'client_name' => 'Apex Legal & Compliance Group',
        'category' => 'ai',
        'tagline' => 'AI legal discovery platform indexing 8M+ confidential contracts with millisecond vector recall.',
        'summary' => 'Integrated LLM retrieval-augmented generation engine with role-based document access and cited audit responses.',
        'challenge' => 'Paralegals spent hundreds of hours manually reviewing thousands of PDF clauses and regulatory amendments with high human error risk.',
        'solution' => 'Implemented high-speed text extraction pipelines, PgVector embeddings index, hybrid BM25 + dense retrieval, and guardrailed LLM synthesis with exact citations.',
        'banner_image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80',
        'screenshots' => [
            'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80',
        ],
        'live_url' => 'https://devtz.site',
        'github_url' => 'https://github.com/DevTZ',
        'tech_stack' => ['Python', 'FastAPI', 'Laravel Admin', 'PgVector', 'LangChain', 'OpenAI'],
        'metrics' => collect([
            (object)['id' => 10, 'label' => 'Contract Review Speedup', 'value' => '14x'],
            (object)['id' => 11, 'label' => 'Indexed Document Pages', 'value' => '8.2M+'],
            (object)['id' => 12, 'label' => 'Citation Accuracy', 'value' => '99.2%'],
        ]),
    ],
    (object)[
        'id' => 5,
        'title' => 'LogiTrack: Real-Time Fleet & Logistics Telematics',
        'slug' => 'logitrack-fleet-telematics',
        'client_name' => 'TransSahara Freightways',
        'category' => 'web',
        'tagline' => 'Live IoT telemetry and route optimization dashboard for 1,200+ freight vehicles.',
        'summary' => 'Real-time WebSocket telemetry engine calculating geofences, fuel efficiency anomalies, and dynamic ETA updates.',
        'challenge' => 'Massive volume of continuous GPS sensor pings caused database lock contention and delayed dispatch alerts.',
        'solution' => 'Designed a TimescaleDB / Redis ingestion pipeline processing 25,000 telemetry messages/second with instantaneous map visualization.',
        'banner_image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80',
        'screenshots' => [
            'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80',
        ],
        'live_url' => 'https://devtz.site',
        'github_url' => 'https://github.com/DevTZ',
        'tech_stack' => ['Laravel', 'TimescaleDB', 'Redis', 'Mapbox', 'WebSockets'],
        'metrics' => collect([
            (object)['id' => 13, 'label' => 'Telemetry Ingestion Rate', 'value' => '25k msg/s'],
            (object)['id' => 14, 'label' => 'Fuel Waste Cut', 'value' => '18.4%'],
            (object)['id' => 15, 'label' => 'On-Time Dispatch Rate', 'value' => '98.6%'],
        ]),
    ],
    (object)[
        'id' => 6,
        'title' => 'TradeCore: Ultra-Low Latency Crypto Trading Terminal',
        'slug' => 'tradecore-crypto-terminal',
        'client_name' => 'Vortex Capital Syndicate',
        'category' => 'web',
        'tagline' => 'Sub-millisecond WebSocket order book and quantitative algorithmic execution suite.',
        'summary' => 'Institutional trader desktop web application featuring multi-exchange liquidity aggregation and automated risk limits.',
        'challenge' => 'Market makers required high-frequency chart rendering and real-time execution without UI thread freezing or lagging.',
        'solution' => 'Constructed WebGL-accelerated chart components, binary WebSocket serialization, and high-performance Laravel queue workers.',
        'banner_image' => 'https://images.unsplash.com/photo-1642543492481-44e81e3914a7?auto=format&fit=crop&w=1200&q=80',
        'screenshots' => [
            'https://images.unsplash.com/photo-1642543492481-44e81e3914a7?auto=format&fit=crop&w=1200&q=80',
        ],
        'live_url' => 'https://devtz.site',
        'github_url' => 'https://github.com/DevTZ',
        'tech_stack' => ['Vue 3', 'Laravel', 'Swoole', 'Redis Streams', 'WebGL', 'Tailwind'],
        'metrics' => collect([
            (object)['id' => 16, 'label' => 'Order Book Refresh Rate', 'value' => '60 FPS'],
            (object)['id' => 17, 'label' => 'Execution Latency', 'value' => '< 15ms'],
            (object)['id' => 18, 'label' => 'Daily Traded Volume', 'value' => '$65M+'],
        ]),
    ],
];

$members = [
    [
        'id' => 1,
        'name' => 'DevTZ Engineering Lead',
        'role' => 'Founder & Principal Architect',
        'bio' => 'Specializing in enterprise Laravel systems, high-concurrency microservices, and cloud infrastructure for scaling products.',
        'photo' => null,
        'portfolio' => 'https://devtz.site',
        'social' => [
            'github' => 'https://github.com/DevTZ',
            'linkedin' => 'https://linkedin.com/company/devtz'
        ]
    ],
    [
        'id' => 2,
        'name' => 'Senior Full-Stack Engineer',
        'role' => 'Lead Web Architect',
        'bio' => 'Passionate about building responsive, high-performance web applications with React, Vue, and modern cloud APIs.',
        'photo' => null,
        'portfolio' => 'https://devtz.site',
        'social' => [
            'github' => 'https://github.com/DevTZ',
            'linkedin' => 'https://linkedin.com/company/devtz'
        ]
    ],
    [
        'id' => 3,
        'name' => 'Mobile & Systems Engineer',
        'role' => 'Flutter & iOS/Android Specialist',
        'bio' => 'Crafting fluid cross-platform mobile apps with local SQLite synchronization, biometric security, and clean UI/UX.',
        'photo' => null,
        'portfolio' => 'https://devtz.site',
        'social' => [
            'github' => 'https://github.com/DevTZ',
            'linkedin' => 'https://linkedin.com/company/devtz'
        ]
    ],
];

function renderComponent($compName, $extraVars = []) {
    global $services, $projects, $members;
    $compFile = __DIR__ . '/../resources/views/components/' . $compName . '.blade.php';
    if (!file_exists($compFile)) return '';
    $data = array_merge(compact('services', 'projects', 'members'), $extraVars);
    return renderViewFile($compFile, $data);
}

function compileBladeString($content) {
    $content = preg_replace('/@php\b/', '<?php', $content);
    $content = preg_replace('/@endphp\b/', '?>', $content);

    // Directive @foreach(...) - match balanced parens
    $content = preg_replace_callback('/@foreach\s*(\((?:[^()]+|(?1))*\))/', function($m) {
        return '<?php foreach' . $m[1] . ': ?>';
    }, $content);
    $content = preg_replace('/@endforeach\b/', '<?php endforeach; ?>', $content);

    // Directive @if(...) - match balanced parens
    $content = preg_replace_callback('/@if\s*(\((?:[^()]+|(?1))*\))/', function($m) {
        return '<?php if' . $m[1] . ': ?>';
    }, $content);

    $content = preg_replace_callback('/@elseif\s*(\((?:[^()]+|(?1))*\))/', function($m) {
        return '<?php elseif' . $m[1] . ': ?>';
    }, $content);

    $content = preg_replace('/@else\b/', '<?php else: ?>', $content);
    $content = preg_replace('/@endif\b/', '<?php endif; ?>', $content);

    $content = preg_replace('/@csrf\b/', '<input type="hidden" name="_token" value="csrf_token">', $content);

    $content = preg_replace_callback("/@include\s*\(\s*'components\.([^']+)'(?:\s*,\s*(\[.*?\]))?\s*\)/s", function($m) {
        $comp = $m[1];
        $vars = !empty($m[2]) ? $m[2] : '[]';
        return '<?php echo renderComponent(\'' . $comp . '\', ' . $vars . '); ?>';
    }, $content);

    $content = preg_replace_callback('/\{\{\s*(.*?)\s*\}\}/s', function($m) {
        return '<?php echo htmlspecialchars(' . $m[1] . ' ?? "", ENT_QUOTES, "UTF-8"); ?>';
    }, $content);

    $content = preg_replace_callback('/\{\!\!\s*(.*?)\s*\!\!\}/s', function($m) {
        return '<?php echo ' . $m[1] . ' ?? ""; ?>';
    }, $content);

    return $content;
}

function renderViewFile($file, $data = []) {
    extract($data);
    $content = file_get_contents($file);
    $compiled = compileBladeString($content);

    ob_start();
    eval('?>' . $compiled);
    return ob_get_clean();
}

if (!function_exists('route')) {
    function route($name, $params = []) {
        return '/' . $name;
    }
}

// Master Render Process
$layoutFile = __DIR__ . '/../resources/views/layouts/app.blade.php';

$rawPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$cleanPath = '/' . trim(strtolower($rawPath), '/');

if (in_array($cleanPath, ['/manage', '/login', '/admin'])) {
    $targetFile = __DIR__ . '/../resources/views/auth/login.blade.php';
} else {
    $targetFile = __DIR__ . '/../resources/views/portfolio.blade.php';
}

$layoutRaw = file_get_contents($layoutFile);
$pageRaw = file_get_contents($targetFile);

// Remove @extends and @section in child template before merging
$pageRaw = preg_replace('/@extends\s*\(\s*\'layouts\.app\'\s*\)/', '', $pageRaw);
$pageRaw = preg_replace('/@section\s*\(\s*\'content\'\s*\)/', '', $pageRaw);
$pageRaw = preg_replace('/@endsection\b/', '', $pageRaw);

// Merge raw template into raw layout @yield('content')
$combinedRaw = str_replace("@yield('content')", $pageRaw, $layoutRaw);

// Render the combined raw template
$data = compact('services', 'projects', 'members');
$outputHtml = renderViewFileString($combinedRaw, $data);

function renderViewFileString($rawContent, $data = []) {
    extract($data);
    $compiled = compileBladeString($rawContent);

    ob_start();
    eval('?>' . $compiled);
    return ob_get_clean();
}

echo $outputHtml;
