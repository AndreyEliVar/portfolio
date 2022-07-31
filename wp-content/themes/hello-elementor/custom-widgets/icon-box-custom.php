<?php
namespace Elementor;

class Icon_Box_Custom_Widget extends Widget_Base{

    public function get_name() {
        return 'icon-box-custom';
    }

    public function get_title() {
        return 'Icon Box Custom';
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'icon_box_icon',
            [
                'label' => 'Icon',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => 'Icon',
                'type' => Controls_Manager::ICON,
                'default' => 'fas fa-star', 
                'library' => 'fa-solid',
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'elementor'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'elementor'),
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_content',
            [
                'label' => 'Content',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'default' => 'Title',
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => 'Description',
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Description',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<div class="icon-box">';
        if (!empty($settings['link']['url'])) {
            echo '<div class="icon"><a href="' . $settings['link']['url'] . '"> <i class="' . $settings['icon'] . '"></i> </a></div>';
        } else {
            echo '<div class="icon"><i class="' . $settings['icon'] . '"></i></div>';
        }
        
        echo '<h3 class="title">' . $settings['title'] . '</h3>';
        echo '<p class="description">' . $settings['description'] . '</p>';
        echo '</div>';
    }
}