import React, { useState } from 'react';
import './GiftCards.css';
import RedeemGift from './RedeemGift';
import { useNavigate } from 'react-router-dom';
import { useRef as myUseRef } from 'react';


function GiftCardsPage() {
    const [showRedeemWindow, setShowRedeemWindow] = useState(false);
    const navigate = useNavigate();
    const lastScrollTop =myUseRef(0);
    const [isNavbarVisible, setIsNavbarVisible] = useState(true);
    const handleBuyGiftCardClick = () => {
        // handle buy gift card logic
    };

    const handleRedeemGiftCardClick = () => {
        setShowRedeemWindow(true);
    };

    return (
        <div className="gift-cards-page1">
            <h1 className="H11">Gift Cards</h1>
            <h2 className="H22">Give the Gift of Rides</h2>
            <h3 className="H33">Send gift cards to your loved ones for Lyft rides and bike or scooter rides.</h3>
            <div className="gift-card-buttons">
                <div className="gift-card-buttons1">
                <button  onClick={handleBuyGiftCardClick}>
                    Buy a Gift Card
                </button>
                </div>
                <div className="gift-card-buttons2">
                <button  onClick={() => {
                    navigate("/RedeemGift");
                }}>Redeem Gift Card</button>
                </div>
            </div>
            <div className="gift-card-history1">
                <h2 className="H22">Gift Card History</h2>
                <ul className="U11">
                    <li className="L11">Purchases<textarea className="T11" placeholder="No gift card purchases."></textarea></li>
                    <li className="L11">Redemptions<textarea className="T11"  placeholder="No gift card redemptions." ></textarea></li>
                </ul>
            </div>
            {showRedeemWindow && <ShowRedeemWindow setShowRedeemWindow={setShowRedeemWindow} />}
        </div>
    );
}

export default GiftCardsPage;
