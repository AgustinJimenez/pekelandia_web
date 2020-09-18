<?php namespace Modules\Empresa\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('Guia Infantil'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );

                $item->item(trans('Categorías'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->route('admin.categoria.categoria.indexCategorias');
                    $item->authorize(
                        $this->auth->hasAccess('categoria.categorias.index')
                    );
                });

                $item->item(trans('Guia'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.empresa.empresa.create');
                    $item->route('admin.empresa.empresa.index');
                    $item->authorize(
                        $this->auth->hasAccess('empresa.empresas.index')
                    );
                });

                $item->item(trans('Países'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->route('admin.categoria.categoria.indexPaises');
                    $item->authorize(
                        $this->auth->hasAccess('paises.pais.index')
                    );
                });

            });
        });

        return $menu;
    }
}
