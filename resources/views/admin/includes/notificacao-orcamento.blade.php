<li>
    <a href="javascript:;" class="notification " data-toggle="dropdown">
        <i class="mdi mdi-bell-outline"></i>
        <span class="badge badge-success">4</span>
    </a>
    <ul class="dropdown-menu mailbox dropdown-menu-right">
        <li>
            <div class="drop-title">Solicitações de Orçamento</div>
        </li>
        <li class="notification-scroll">
            <div class="message-center">
                @foreach($contratos_nao_visualizados as $contrato)
                    <a href="#">
                        <div class="user-img">
                            <i class="ti ti-star"></i>
                        </div>
                        <div class="mail-contnet">
                            <h6>{{$contrato->cliente->nome}}</h6>
                            <span class="mail-desc">{{$contrato->veiculo->modelo->nome}}</span>
                        </div>
                    </a>
                @endforeach


            </div>
        </li>
        <li>
            <a class="text-center bg-light" href="javascript:void(0);">
                <strong>See all notifications</strong>
            </a>
        </li>
    </ul>
</li>
