# MAINTENANCE

# Maintaining this plugin

## Links

| Publishing System | @cagov/ca-design-system-gutenberg-blocks |
| --- | --- |
| Platform | WordPress 5.9 |
| Design system | @cagov/design-system |
| Block library namespace | ca-design-system |
| Coding standards | WPCS |

## Design system components supported in this plugin

| Name | Package on npm | Latest version | Last updated | Type of component | Docs | Notes |
| --- | --- | --- | --- | --- | --- | --- |
| Accordion | @cagov/ds-accordion | 2.0.0 | Feb 24, 2022 | Content | https://designsystem.webstandards.ca.gov/components/accordion/readme/ | Recent upgrade not tested in WP GB plugin |
| Base CSS | @cagov/ds-base-css | 1.0.15 | Feb 8, 2022 | CSS | https://designsystem.webstandards.ca.gov/components/base-css/readme/ | Still complicated with upstream theme & overrides |
| Link grid | @cagov/ds-link-grid | 2.1.0 | Feb 3, 2022 | Content | https://designsystem.webstandards.ca.gov/components/link-grid/readme/ | renamed, was button grid  |
| Feature card | @cagov/ds-feature-card | 1.0.6 | Feb 22, 2022 | Content | https://designsystem.webstandards.ca.gov/components/feature-card/readme/ |  |
| Feedback | @cagov/ds-feedback | 1.0.12 | Jan 17, 2022 | Content/Service | https://designsystem.webstandards.ca.gov/components/page-feedback/readme/ | Doesn’t belong in this set of features |
| Highlight section | @cagov/ds-highlight-section | 1.0.1 | Jan 19, 2022 | Content |  | New, no docs |
| Page alert | @cagov/ds-page-alert | 2.0.0 | Jan 24, 2022 | Content | https://designsystem.webstandards.ca.gov/components/page-alert/readme/ |  |
| Page navigation | @cagov/ds-page-navigation | 2.1.0 | Feb 3, 2022 | Content | https://designsystem.webstandards.ca.gov/components/page-navigation/readme/ |  |
| Pagination | @cagov/ds-pagination | 2.0.0 | Jan 17, 2022 | Content | https://designsystem.webstandards.ca.gov/components/pagination/readme/ |  |
| Regulatory outline | @cagov/ds-regulatory-outline | 1.0.1 | Nov 9, 2021 | Content | https://designsystem.webstandards.ca.gov/components/regulatory-outline/readme/ |  |
| Step list | @cagov/ds-step-list | 2.0.1 | Jan 11, 2022 | Content | https://designsystem.webstandards.ca.gov/components/step-list/readme/ | Has a bug (class namespace) |
| PDF icon | ? |  |  | Icon |  | Where did it go in npm? |
| Minus | @cagov/ds-minus | 1.0.1 | Nov 9, 2021 | Icon |  | Will become deprecated  |
| Plus | @cagov/ds-plus | 1.0.1 | Nov 9, 2021 | Icon |  | Will become deprecated  |

## Update process

- Bump plugin number in `ca-design-system-gutenberg-blocks.php`
    - Two places - plugin definition & constants
- Update the package table in this README
    - Notion version is here: [https://www.notion.so/chach-sikes-odi-notes/MAINTENANCE-381e7b95a8ea498aa3e1a60a091cc90b](https://www.notion.so/MAINTENANCE-381e7b95a8ea498aa3e1a60a091cc90b)
        - Export to markdown when finished and replace this file
    - Check package version on npm: [https://www.npmjs.com/org/cagov](https://www.npmjs.com/org/cagov)
        - Packages are prefixed with `ds-`.
        - Check for new design system components
        - Check for design system component name changes or other significant changes
        - Coordinate with Design System team if there are any issues
- Update design system package updates: `./cagov-design-system/package.json`
- Create bundle for WordPress instance:
    - `cd ./cagov-design-system`
    - `npm install`
    - `npm run build`
- Check any PHP markup dynamic rendering
    - Ensure sample markup and dynamic rendering are correct with design system spec
- (Future) manage any content upgrades
    - with an update script
    - migrate content model changes with attribute deprecation
- Update ROADMAP
- Update CHANGELOG
- Update project board
- Draft communication about this release
- Notify core teams of upcoming update
- Release as `x.x.x-dev` or `x.x.x-rc` and test on sandbox site.
    - Get code review and sign off from a couple of plugin reviewers (may require coordination with a PM, and may require scheduling)
- After successful review, do release
    - Notify channels
    - Encourage testing the update and then moving it to production
        - Back up as needed
    - May require a content or short maintenance window update
    - If content update, then make sure update process is clear in the CHANGELOG

## Features, bugs & issues update

- Check for issues and bugs
- Work with product team to prioritize bugs and issues
- Check for pull requests
- Fix issues if possible in separate point release
- Update ROADMAP
- Update CHANGELOG
- Update project board

## WordPress installation update

Sometimes WordPress core is updated. 

- Review the update
- Make sure that the upcoming changes will not impact the code.
    - If it does, create issue on project board and schedule updates.