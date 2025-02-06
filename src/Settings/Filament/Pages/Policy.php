<?php

namespace A2Insights\FilamentSaas\Settings\Filament\Pages;

use A2Insights\FilamentSaas\Settings\Settings;
use A2Insights\FilamentSaas\Settings\TermsSettings;
use Filament\Pages\BasePage;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class Policy extends BasePage
{
    protected ?string $maxContentWidth = 'full';

    protected static string $view = 'filament-saas::settings.policy';

    public string $policy;

    public function getTitle(): string | Htmlable
    {
        return __('filament-saas::default.privacy-policy.title');
    }

    public function mount()
    {
        $settings = App::make(Settings::class);

        if (! $settings->terms) {
            return redirect('/');
        }

        $policy = App::make(TermsSettings::class)->privacy_policy;

        $this->policy = Str::markdown($policy);
    }

    public function hasLogo(): bool
    {
        return false;
    }
}
