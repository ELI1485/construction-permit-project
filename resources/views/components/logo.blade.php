@props(['class' => 'h-10 w-10'])

<svg {{ $attributes->merge(['class' => $class]) }} viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
    <!-- Outer navy ring -->
    <circle cx="100" cy="100" r="95" stroke="#1B3A5C" stroke-width="10" fill="none"/>
    <!-- White ring -->
    <circle cx="100" cy="100" r="80" stroke="white" stroke-width="8" fill="none"/>
    <!-- Inner navy circle -->
    <circle cx="100" cy="100" r="72" fill="#1B3A5C"/>
    <!-- Gold arch -->
    <path d="M65 150 L65 90 C65 60 100 35 100 35 C100 35 135 60 135 90 L135 150" stroke="#C9A227" stroke-width="6" fill="none"/>
    <path d="M72 150 L72 95 C72 70 100 48 100 48 C100 48 128 70 128 95 L128 150" stroke="#C9A227" stroke-width="4" fill="none"/>
    <!-- Gold buildings -->
    <rect x="78" y="100" width="8" height="50" fill="#C9A227"/>
    <rect x="89" y="85" width="10" height="65" fill="#C9A227"/>
    <rect x="102" y="90" width="10" height="60" fill="#C9A227"/>
    <rect x="115" y="105" width="8" height="45" fill="#C9A227"/>
    <!-- Spire -->
    <rect x="93" y="70" width="3" height="15" fill="#C9A227"/>
    <polygon points="94.5,62 91,70 98,70" fill="#C9A227"/>
    <!-- Arrow overlay -->
    <polygon points="100,75 88,110 95,110 95,130 105,130 105,110 112,110" fill="#C9A227" opacity="0.6"/>
</svg>
